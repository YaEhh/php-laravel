@extends('app')

@section('title')
	Blog Index
@endsection

@section('content')
	@include('includes.info-box')
	<div class="container-wrapper">
		@foreach($posts as $post)
			<article class=" blog-post">
				<div class="blog-post-wrapper">
					<h4 class="post-title"> {{$post->title }} </h4>
					<span class="subtitle"> {{$post->author }} | {{$post->created_at}} </span>
					<p class="post-body"> {{$post->body}} </p>
					<span class="view-link"> <button><a href="{{ route('blog.single', ['post_id' => $post->id, 'end' => 'frontend']) }} "> View </a> </span> </button>
				</div>
			</article>
		@endforeach
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
	</div>

	@endif
@endsection
