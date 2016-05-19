@extends('app')

@section('title')
	Sign Up
@endsection

@section('content')
	@include('includes.info-box')
	<div class="container login">
		<div class="login-1">
			<h3>Log In</h3>
		</div>
		<div class="login-2">
			<form action=" {{ route('user.login') }} " method="post">
				<div class="input-label">
					<label for="username"> Username </label>
				</div>
				<div class="input-group">
					<input type="text" name="username" id="username" {{$errors->has('username') ? 'class=has-error' : ''}} value="{{Request::old('username') ? Request::old('username') : "" }}" />
				</div>
				<br>
				<div class="input-label">
					<label for="password"> Password </label>
				</div>
				<div class="input-group">
					<input type="password" name="password" id="password" {{$errors->has('password') ? 'class=has-error' : ''}} />
				</div>
				<br>
				<button type="submit" class="comment-link"> Login</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}" />
			</form>
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">

	</script>
	<script type="text/javascript" src=""></script>
@endsection
