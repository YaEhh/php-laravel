<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$admin = new User();
		$admin->email = 'test@test.com';
		$admin->password = bcrypt('test');
		$admin->save();
	}

}
