@extends('admin')

@section('styles')
	<link rel="stylesheet" href="{{ URL::secure('css/admin.css') }}" type="text/css" />
@endsection

@section('content')
	<div class="container text-left">
		@include('includes.info-box')
		<form action=" {{ route('admin.blog.post.create') }}" method="post">
			<div class="input-label">
				<label for="title"> Title </label>
			</div>
			<div class="input-group">
				<input type="text" name="title" id="title" {{$errors->has('title') ? 'class=has-error' : ''}} value="{{ Request::old('title')}}" />
			</div>
			<div class="input-label">
				<label for="author"> Author </label>
			</div>
			<div class="input-group">
				<input type="text" name="author" id="author" {{ $errors->has('author') ? 'class=has-error' : '' }} value="{{ Request::old('author')}}" />
			</div>
			<div class="input-label">
				<label for="category_select"> Category Select </label>
			</div>
			<div class="input-group">
					<select name="category_select" id="category_select">
						@foreach($categories as $category)
							<option value=" {{ $category->id }}"> {{ $category->name }} </option>
						@endforeach
					</select>
						<button type="button" class=" add-category btn-warning btn-md btn"> Add Category </button>
					<div class="added_categories">
						<ul></ul>
					</div>
			</div>
			<div class="input-group">
				<input type="hidden" name="categories" id="categories"> 
			</div>
			<div class="input-label">
				<label for="body"> Body </label>
			</div>
			<div class="input-group">
				<textarea name="body" id="body" rows="12" {{ $errors->has('body') ? 'class=has-error' : '' }}> {{ Request::old('body') }}</textarea>
				<input type="hidden" name="_token" value="{{ Session::token() }}" />
			</div>
			<div class="submit">
				<button type="submit" name="submit" class="btn btn-md btn-warning"> Submit </button>
			</div>
		</form>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src=" {{ asset('js/posts.js') }}"> </script>
@endsection