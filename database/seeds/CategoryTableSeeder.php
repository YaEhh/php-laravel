<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;


class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$category = new Category();
		$category->name = "Tech";
		$category->save();

		$category = new Category();
		$category->name = "Sports";
		$category->save();

		$category = new Category();
		$category->name = "Food";
		$category->save();


	}

}
