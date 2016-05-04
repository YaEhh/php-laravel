@extends('app')

@section('title')
	Sign Up
@endsection 

@section('content')
	{{$comments->first()}}
	<div class="container">
		@include('includes.info-box')
		<h3> Sign Up</h3>
		<form action=" {{ route('signup') }} " method="post">
			<div class="input-label">
				<label for="username"> Username </label>
			</div>
			<div class="input-group">
				<input type="text" name="username" id="username" {{$errors->has('username') ? 'class=has-error' : ''}} value="{{Request::old('username') ? Request::old('username') : "" }}" />
			</div>
			<div class="input-label">
				<label for="password"> Password </label>
			</div>
			<div class="input-group">
				<input type="password" name="password" id="password" {{$errors->has('password') ? 'class=has-error' : ''}} />
			</div>
			<br>
			<button type="submit" class="btn btn-sm btn-warning"> Sign Up</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}" />	
		</form>
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript">
		
	</script> 
	<script type="text/javascript" src=""></script>
@endsection