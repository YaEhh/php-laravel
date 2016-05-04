<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller 
{

	public function getSignUp() 
	{
		return view('frontend.blog.new_user');
	}

	public function postSignUp(Request $request)
	{
		$this->validate($request, [
			'username' => 'required|unique:users|max:30',
			'password' => 'required'
		]);

		$user = new User();
		$user->username = $request['username'];
		$user->password = bcrypt($request['password']);

		if ($user->save()) {
			return redirect()->route('blog.index')->with(['success' => 'You have successfully signed up!']);
		} else {
			return redirect()->back()->with(['fail' => 'An error occured. Please try again ']);
		}

	}

	public function getUserLogin()
	{
		return view('frontend.blog.user-login');
	}

	public function postUserLogin(Request $request) {

		$this->validate($request, [
			'username' => 'required',
			'password' => 'required'
		]);

		$username = $request['username'];
		$password = $request['password']; 
		$user_id;

		if (User::where('username', $username)->count()) {
			$user = User::where('username', $username)->get()->first();
			$password_db = Hash::check($password, $user->password);
			$user_id = $user->id;
		} else {
			return redirect()->back()->with(['fail' => 'Username does not exist!']);
		}
		 

		if ($password_db) {
			Session::put('user_id', $user_id );
			return redirect()->route('blog.index')->with(['success' => "User successfully logged in"]);
		} else {
			return redirect()->back()->with(['fail' => 'Log in failed!']);
		}
	}

	public function getUserLogout() {
		Session::forget('user_id');
		return redirect()->route('blog.index')->with(['success' => 'You have logged out!']);
	}

}