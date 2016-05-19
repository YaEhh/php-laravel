@extends('admin')

@section('content')
	@include('includes.info-box')
	<div class="container single-post">
		<div class="post-admin text-center">
			<a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}" class="post-btn"> Edit Post</a>
			<a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}"class="post-btn"> Delete Post </a>
		</div>
		<div class="post-dtl">
			<h4 class="post-title-single"> {{ $post->title }} <hr /></h4>

			<span class="info-single"> {{ $post->author }} | {{ $post->created_at}} </span>
			<br />
			<br />
			<p> {{ $post->body }} </p>
		</div>
	</div>
@endsection
