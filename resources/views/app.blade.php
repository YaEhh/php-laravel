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
			<div class="my-nav">
				<div class="my-logo">
					<a class="" href="{{route('blog.index')}}">WanderMunch</a>
				</div>

				<div class="my-nav2">
					<ul class="my-nav2-list">
						<li><a href="{{ route('contact') }}">CONTACT</a></li>
						@if(logged_in())
							<li><a> {{strtoupper(logged_in()->username)}} </a></li>
							<li><a href=" {{ route('user.logout')}}">LOGOUT</a></li>
						@else
							<li><a href=" {{ route('user.login')}}">LOGIN</a></li>
							<li><a href=" {{ route('signup') }}">REGISTER</a></li>
						@endif
							<li><a href=" {{ route('admin.login') }}">ADMIN AREA</a></li>
							<li><a href="{{ url('/') }}">ABOUT</a></li>
					</ul>
				</div>
			</div>




	@yield('content')
	<script>
		var baseUrl = "";
	</script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	@yield('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
