<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;


class PostController extends Controller
{

	public function getBlogIndex()
	{
		$posts = Post::paginate(5);
		foreach ($posts as $post) {
			$post->body = $this->shortenText($post->body, 20);
		}
		return view('frontend.blog.index', ['posts' => $posts]);
	}

	public function getSinglePost($post_id, $end = 'frontend')
	{
		$post = Post::find($post_id);
		$comments = $post->comments;
		if (!$post) 
		{
			return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
		}
		return view($end . '.blog.single', ['post' => $post, 'comments' => $comments]);
	}

	public function postSinglePost($post_id, $end = 'frontend', Request $request)
	{
		$this->validate($request, [
			'body' => 'required'
		]);

		$comment = new Comment();
		$user = User::find(Session::get('user_id'));
		$post = Post::find($post_id);
		$username = $user->username;
		$comment->post_id = $post_id;
		$comment->body = $request['body'];
		$comment->user_id = $user->id;
		if ($comment->save()) {
			return Response::json(["message" => "Comment Created", "new_comment" => $comment, 'username' => $username],200);
			// return redirect()->route('blog.single', ['post_id' => $post_id, 'end' => 'frontend'])->with(['success' => 'Comment created successfully!']);
		}
	}


	public function getCreatePost() 
	{
		$categories = Category::all(); 
		return view("admin.blog.create_post", ['categories' => $categories]);

	}

	public function postCreatePost(Request $request)
	{
		$this->validate($request,[
			'title' => 'required|max:120|unique:posts',
			'author' => 'required|max:80',
			'body' => 'required'
		]);

		$post = new Post();
		$post->title = $request['title'];
		$post->author = $request['author'];
		$post->body = $request['body'];
		$post->save();

		if (strlen($request['categories']) > 0) {
			$categoryIDs = explode(',', $request['categories']);

			foreach($categoryIDs as $categoryID) {
				$post->categories()->attach($categoryID);
			}

		}
		return redirect()->route('admin.index')->with(['success' => 'Post successfully created!']);
	}


	public function getPostIndex() 
	{
		$posts = Post::paginate(5);
		return view('admin.blog.index', ['posts' => $posts]);
	}


	public function getUpdatePost($post_id)
	{
		$post = Post::find($post_id);
		$categories = Category::all();
		$post_categories = $post->categories;
		$post_categories_ids = array();
		$i = 0;

		foreach ($post_categories as $post_category) {
				$post_categories_ids[$i] = $post_category->id;
				$i++;
		}

		if (!$post) 
		{
			return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
		}

		return view('admin.blog.edit_post', ['post' => $post, 'categories' => $categories, 'post_categories' => $post_categories, 'post_categories_ids' => $post_categories_ids]);
	}


	public function postUpdatePost(Request $request) 
	{
		$this->validate($request, [
			'title' => 'required|max:120',
			'author' => 'required|max:80',
			'body' => 'required'
		]);

		$post = Post::find($request['post_id']);
		$post->title = $request['title'];
		$post->author = $request['author'];
		$post->body = $request['body'];
		$post->update();
		$post->categories()->detach();
		if (strlen($request['categories']) > 0) {
			$categoryIDs = explode(',', $request['categories']);

			foreach($categoryIDs as $categoryID) {
				$post->categories()->attach($categoryID);
			}

		}


		return redirect()->route('admin.index')->with(['sucess' => "Post successfuly updated!"]);
	}

	public function getDeletePost($post_id)
	{
		$post = Post::find($post_id);
		if (!$post) {
			return redirect()->route('blog.index')->with(['fail' => 'Post not found!']);
		}
		$post->delete();
		return redirect()->route('admin.index')->with(['success' => 'Post successfully deleted !']);
	}

	public function shortenText($text, $word_count)
	{
		if (str_word_count($text, 0) > $word_count) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$word_count]) . '....';
		}
		return $text;
	}



}






