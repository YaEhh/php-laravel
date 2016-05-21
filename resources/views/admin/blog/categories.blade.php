@extends('admin')

@section('content')
	<div class="container">
		<div class="category-admin">
			<form action=" {{ route('admin.blog.category.create') }}" method="post">
				<div class="input-group cat-create">
						<label for=""> Category Name </label>
						<input name="name" id="name" type="text"/>
						<button type="submit" name="submit" class=" post-btn">Create a Category</button>
				</div>
			</form>
		</div>
		<div class="list">
			@foreach($categories as $category)
				<article class="category-list">
					<div class="category-info" data-id = "{{ $category->id }}">
						<h4> {{ $category->name }} </h4>
					</div>
					<div class="edit">
						<nav>
							<ul>
								<li class= "category-edit"> <input type="text" value="blah"/> </li>
								<li> <a href=""/> Edit </a> </li>
								<li> <a href=""/> Delete </a> </li>
							</ul>
						</nav>
					</div>
				</article>
			@endforeach
		</div>
		<br>
		@if($categories->lastPage() > 1)
				<section class=" col-md-12 text-center" >
					<div class="paginate">
						@if($categories->currentPage() !== 1)
						<p>
							Previous page	<a href="{{ $categories->previousPageUrl() }}"><i class="glyphicon glyphicon-chevron-left"></i></a>
						</p>
						@endif
						@if($categories->currentPage() !== $categories->lastPage())
						<p>
							Next page	<a href="{{ $categories->nextPageUrl() }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
						</p>
						@endif
					</div>
				</section>
			@endif
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ asset('js/categories.js') }}"></script>
@endsection
