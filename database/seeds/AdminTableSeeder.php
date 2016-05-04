<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin;

class AdminTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$admin = new Admin();
		$admin->email = 'test@test.com';
		$admin->password = bcrypt('test_pw');
		$admin->save();
	}

}
