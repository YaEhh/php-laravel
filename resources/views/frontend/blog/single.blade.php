@extends('app')

@section('title')
	{{ $post->title }}
@endsection

@section('content')

		<div class="container">
			<article data-id="{{$post->id}}" class="single-post">
				<h4> {{ $post->title }} <hr /> </h4>

				<span class="subtitle"> {{ $post->author }} | {{ $post->created_at }} </span>
				<p class="post-dtl"> {{ $post->body }} </p>
			</article>
		</div>


		@include('includes.info-box')

		@if(isset($comments))
			<div class="box">
				<h4 class="comment-title"> Comments </h4>
				<div class="single-comment text-center">
					@foreach($comments as $comment)
						<div class="comment-body text-left">
							<li> {{$comment->user->username}} posted at {{$comment->created_at }} :
							 {{$comment->body}}  </li>
						</div>
					@endforeach
				</div>
				<div class="added-comment text-center">
						<div class="comment-body text-left">
							<li>   </li>
						</div>
				</div>
				</div>
			@endif

			@if (logged_in())
				<br>

				<div class="comments text-center">
					<form action=" " method="post">
						<div class="input-label">
							<label for="body"> Enter comment e </label>
						</div>
						<div class="input-group">
							<input type="text" name="body" id="body" {{$errors->has('body') ? 'class=has-error' : ''}} value="{{Request::old('body') ? Request::old('body') : "" }}" />
						</div>
						<input type="hidden" name="_token" value="{{Session::token()}}" />
						<input type="hidden" name="user_id" value="{{ logged_user_id() }}" />
						<br>
						<input type="submit" id="submit" name="submit" class="btn comment-link"/>
					</form>
			</div>
	@endif
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{Session::token()}}";
	</script>
	<script type='text/javascript' src="{{ asset('js/comments.js')}}"</script>
@endsection
