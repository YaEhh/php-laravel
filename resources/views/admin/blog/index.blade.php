@extends('admin')


@section('content')
		@include('includes.info-box')
		<div class="">
			<div id="post-admin">
				<a href=" {{ route('admin.blog.create_post') }}" class="post-btn"> New Post </a>
			</div>
				<ul>
					@if(count($posts) <= 0)
					<li> No Posts </li>
					@else
						@foreach($posts as $post)
							<article class=" blog-post">
								<h4> {{$post->title }} </h4>
								<span class="subtitle"> {{$post->author }} | {{$post->created_at}} </span>
								<p> {{$post->body}} </p>
									<nav>
			 								<li><a href="{{ route('admin.blog.post', ['post_id' => $post->id, 'end' => 'admin']) }}"class="dash-links">View </a> |
			 										<a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}" class="dash-links">Edit </a> |
			 										<a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="dash-links">Delete </a></li>
			 						</nav>
							</article>
						@endforeach
					@endif
				</ul>
			@if($posts->lastPage() > 1)
				<section class=" col-md-12">
					<div class="paginate">
						@if($posts->currentPage() !== 1)
						<p>
							Previous Page <a href="{{ $posts->previousPageUrl() }}"><i class="glyphicon glyphicon-chevron-left"></i></a>
						</p>
						@endif
						@if($posts->currentPage() !== $posts->lastPage())
						<p>
							Next Page <a href="{{ $posts->nextPageUrl() }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
						</p>
						@endif
					</div>
				</section>
			@endif
		</div>
@endsection
