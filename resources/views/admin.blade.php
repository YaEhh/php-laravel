<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Area</title>

	<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">


	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a {{ Request::is('admin') ? 'class= active-link' : 'class=navbar-brand' }}
					href=" {{ route('admin.index') }}">DASHBOARD</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a {{ Request::is('admin/blog/post*') ? 'class= active-link' : "" }} href=" {{ route('admin.blog.index') }}">POSTS</a></li>
					<li><a {{ Request::is('admin/blog/category*') || Request::is('admin/blog/categories*') ? 'class= active-link' : "" }}
					 href=" {{ route('admin.blog.categories') }}">CATEGORIES</a></li>
					<li><a {{ Request::is('admin/contact/*') ? 'class= active-link' : "" }} href="{{ route('admin.contact.index') }}">CONTACT MESSAGES </a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					
						<li><a href=" {{ route('admin.logout') }}">LOGOUT</a></li>
			
				
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
		<script>
		var baseUrl = "";
	</script>
	@yield('scripts')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	@include('includes.footer')
</body>
</html>
