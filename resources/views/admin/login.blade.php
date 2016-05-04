@extends('app')

@section('styles')
@endsection

@section('content')
	<div class="container">
		<h3>Log In </h3>
		<hr>
		@include('includes.info-box')
		<form method="POST" action=" {{ route('admin.login') }}">
			<div class="input-label">
				<label for="email"> Email </label>
			</div>
			<div class="input-group">
				<input type="text" name="email" id="email" {{$errors->has('email') ? 'class=has-error' : ''}} value="{{ Request::old('email')}}" />
			</div>
			<br>
			<div class="input-label">
				<label for="password"> Password </label>
			</div>
			<div class="input-group">
				<input type="password" name="password" id="password" {{$errors->has('email') ? 'class=has-error' : ''}}  />
			</div>
			<br>
			<button type="submit" class="btn btn-sm btn-warning"> Login </button>
			<input type="hidden" name="_token" value="{{ Session::token() }}" />
		</form>
	</div>
@endsection

@section('scripts')
@endsection

