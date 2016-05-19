@extends('app')

@section('title')
	Contact
@endsection

@section('styles')
@endsection

@section('content')
	@include('includes.info-box')
	<div class="container contact-front">
		<form action=" {{ route('contact.send') }}" method="post" id="contact_form">
			<div class="input-group">
				<label for="name"> Your Name </label>
			</div>
			<div>
				<input type="text" name="name" id='name' value="{{ Request::old('name') }}"/>
			</div>
			<div class="input-group">
				<label for="email"> Your Email </label>
			</div>
			<div>
				<input type="text" name="email" id='email' value="{{ Request::old('email') }}"/>
			</div>
			<div class="input-group">
				<label for="subject"> Subject </label>
			</div>
			<div>
				<input type="text" name="subject" id='subject' value="{{ Request::old('subject') }}"/>
			</div>
			<div class="input-group">
				<label for="message"> Message </label>
			</div>
			<div class="message-box">
				<textarea name="message" id="message" rows="10">{{ Request::old('message') }}</textarea>
			</div>
			<button type="submit" class='btn contact-sub'> Submit Message </button>
			<input type="hidden" value="{{ Session::token() }}" name="_token" />
		</form>
	</div>
@endsection
