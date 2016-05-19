@extends('app')

@section('styles')
@endsection

@section('content')
	@include('includes.info-box')
	<div class="container login">
		<div class="login-1">
				<h3> Admin Login </h3>
		</div>
		<div class="login-2">
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
				<button type="submit" class="btn comment-link"> Login </button>
				<input type="hidden" name="_token" value="{{ Session::token() }}" />
			</form>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
