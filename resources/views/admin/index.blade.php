@extends('admin')

@section('styles')

@endsection

@section('content')
	@include('includes.info-box')
	<div class="row">
			 <div class="card-container col-xs-6">
				<div class="card">
				 	<header>
				 		<nav>
				 			<ul class="post-btn-ul">
				 				<li> <a href=" {{ route('admin.blog.create_post') }}" class="post-btn"> New Post</a></li>
				 				<li> <a href=" {{ route('admin.blog.index') }}" class="post-btn"> Show all Post </a></li>
								<hr />
				 			</ul>
				 		</nav>
				 	</header>
				 	<section>
				 		<ul>
				 			@if(count($posts) <= 0)
								<li> No Posts </li>
				 			@else
				 				@foreach($posts as $post)
				 				<li>
					 				<article>
					 					<div class="post-info">
					 						<h4> {{$post->title}} </h4>
					 						<span class="info"> {{ $post->author }} | {{$post->created_at }} </span>
					 					</div>
					 					<div>
					 						<nav>
					 							<ul>
					 								<li><a href="{{ route('admin.blog.post', ['post_id' => $post->id,'end' => 'admin']) }}" class="dash-links">View Post</a></li>  |
					 								<li><a href=" {{ route('admin.blog.post.edit', ['post_id' => $post->id]) }} " class="dash-links">Edit</a></li> |
					 								<li><a href=" {{ route('admin.blog.post.delete', ['post_id' => $post->id]) }} " class="dash-links"> Delete </a></li>
					 							</ul>
					 						</nav>
					 					</div>
					 				</article>
				 				</li>
				 				<hr>
								@endforeach
				 			@endif
				 		</ul>
				 	</section>
				 </div>
			 </div>
		<div class="card-container col-xs-6">
			<div class="card">
				 	<header>
				 		<nav>
				 			<ul class="post-btn-msg">
				 				<li> <a href="{{ route('admin.contact.index') }}" class="post-btn"> Show all Messages </a></li>
								<hr />
				 			</ul>
				 		</nav>
				 	</header>
				 	<section>
				 		<ul>
				 			@if (count($contact_messages) == 0)
				 				<li> No Messages </li>
				 			@endif
				 			@foreach($contact_messages as $contact_message)
				 				<li>
					 				<article data-message="{{ $contact_message->body}}" data-id="{{ $contact_message->id}}" class="contact-message">
					 					<div class="message-info">
					 						<h4> {{ $contact_message->subject }} </h4>
					 						<span class="info"> Sender: {{ $contact_message->sender }} | {{$contact_message->created_at }} </span>
					 					</div>
					 					<div>
					 						<nav>
					 							<ul>
					 								<li><a href="" class="dash-links">View Post</a></li> |
					 								<li><a href="" class="dash-links"> Delete </a> </li>
					 							</ul>
					 						</nav>
					 					</div>
					 				</article>
				 				</li>
				 			@endforeach
				 		</ul>
				 	</section>
			 	</div>
			 </div>
			 <div class="my-modal" id="contact-message-info">
			 	<button class="btn" id="my-modal-close">Close</button>
			 </div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/contact_messages.js') }}"></script>
@endsection
