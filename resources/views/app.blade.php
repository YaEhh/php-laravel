<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	@yield('styles')


	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{route('blog.index')}}">Blog</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">About</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
						@if(logged_in())
							<li><a> Logged in as  {{logged_in()->username}} </a></li>
							<li><a href=" {{ route('user.logout')}}">Logout</a></li>
						@else
							<li><a href=" {{ route('user.login')}}">Login</a></li>
							<li><a href=" {{ route('signup') }}">Register</a></li>
						@endif
						<li><a href=" {{ route('admin.login') }}">Admin Area</a></li>
				
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
	<script>
		var baseUrl = "";
	</script>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	@yield('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	
</body>
</html>
