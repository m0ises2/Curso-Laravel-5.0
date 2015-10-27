<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 8; $i++)
		{ 
			\DB::table('tags')->insert(array(
				'name' => $faker->name,
				'description' => $faker->paragraph(rand(2,6))
			));
		}
		
	}

}