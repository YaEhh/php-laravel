@extends('app')

@section('title')
	Blog Index
@endsection

@section('content')
	@include('includes.info-box')
	@foreach($posts as $post)
		<article class=" blog-post text-center">
			<h4> {{$post->title }} </h4>
			<span class="subtitle"> {{$post->author }} | {{$post->created_at}} </span>
			<p> {{$post->body}} </p>
			<a href="{{ route('blog.single', ['post_id' => $post->id, 'end' => 'frontend']) }} "> Read more </a>
		</article>
	@endforeach
	@if($posts->lastPage() > 1)
		<section class=" col-md-12">
			<div class="paginate">
				@if($posts->currentPage() !== 1)
					<a href="{{ $posts->previousPageUrl() }}"><i class="glyphicon glyphicon-chevron-left"></i></a>
				@endif
				@if($posts->currentPage() !== $posts->lastPage())
					<a href="{{ $posts->nextPageUrl() }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
				@endif
			</div>
		</section>
	@endif
@endsection
