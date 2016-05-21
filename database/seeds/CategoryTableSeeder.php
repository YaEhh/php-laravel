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
		$category->name = "European";
		$category->save();

		$category = new Category();
		$category->name = "Asian";
		$category->save();

		$category = new Category();
		$category->name = "South American";
		$category->save();

		$category = new Category();
		$category->name = "North American";
		$category->save();

		$category = new Category();
		$category->name = "African";
		$category->save();

		$category = new Category();
		$category->name = "South American";
		$category->save();


	}

}
