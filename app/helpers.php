<?php
use App\User;


function logged_in() {
		if(Session::has('user_id')) {
			return User::find(Session::get('user_id'));
		} else {
			return false;
		}
}

function logged_user_id() {
	if(Session::has('user_id')) {
		return User::find(Session::get('user_id'))->first()->id;
	} else {
		return false;
	}
}







