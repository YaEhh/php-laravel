<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

 	public function comments() 
 	{
		$this->hasMany('App\Comment');
	}
}
