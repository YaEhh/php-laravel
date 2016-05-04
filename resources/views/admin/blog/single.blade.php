@extends('admin')

@section('content')
	@include('includes.info-box')
	<div class="container text-center">
		<div class="post-admin">
			<a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}" class="btn btn-sm btn-warning"> Edit Post</a>
			<a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}"class="btn btn-sm btn-warning"> Delete Post </a>
		</div>
		<div>
			<h4> {{ $post->title }}</h4>
			<span class="info"> {{ $post->author }} | {{ $post->created_at}} </span>
			<p> {{ $post->body }} </p>
		</div>
	</div>
@endsection