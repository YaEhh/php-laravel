@extends('admin')

@section('content')
<div class="container">
		<div class="">
			@if (count($contact_messages) == 0)
				No messages
			@endif
			@foreach($contact_messages as $contact_message)
				<article class="contact-message" data-message="{{ $contact_message->body }}" data-id="{{ $contact_message->id }}" >
					<div class="message-info">
						<h4> {{ $contact_message->subject }} </h4>
					</div>
						<span class="info">Sender: {{$contact_message->sender}} | {{$contact_message->created_at }}</span>
					<div class="edit">
						<nav>
							<ul>
								<li> <a href="" class="post-btn"/> Show Message </a> </li>
								<li> <a href="" class="post-btn"/> Delete </a> </li>
							</ul>
						</nav>
					</div>
				</article>

			@endforeach
		</div>
		<br>
		@if($contact_messages->lastPage() > 1)
				<section class=" col-md-12 text-center" >
					<div class="paginate">
						@if($contact_messages->currentPage() !== 1)
							<a href="{{ $contact_messages->previousPageUrl() }}"><i class="glyphicon glyphicon-chevron-left"></i></a>
						@endif
						@if($contact_messages->currentPage() !== $contact_messages->lastPage())
							<a href="{{ $contact_messages->nextPageUrl() }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
						@endif
					</div>
				</section>
			@endif
			 <div class="my-modal text-center" id="contact-message-info">
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
