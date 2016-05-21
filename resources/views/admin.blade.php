<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Area</title>

	<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">


	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

	<div class="my-nav">
		<div class="my-logo">
			<a class="" href="{{route('blog.index')}}">WanderMunch</a>
		</div>

		<div class="my-nav2">
			<ul class="my-nav2-list">
				<li><a href=" {{ route('admin.index') }}">DASHBOARD</a></li>
					<li><a href=" {{ route('admin.blog.index') }}">POSTS</a></li>
					<li><a href="{{ route('admin.contact.index') }}">CONTACT MESSAGES </a></li>
					<li><a href=" {{ route('admin.blog.categories') }}">CATEGORIES</a></li>
			</ul>
		</div>
	</div>

	@yield('content')
		<script>
		var baseUrl = "";
	</script>
	@yield('scripts')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
