<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BiciTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 15; $i++)
		{ 
			\DB::table('bicicleta')->insert(array(
				'name' 	=> $faker->firstname,
				'model' => $faker->lastname,
				'gears'	=> $faker->numberBetween(1, 10),
				'user_id' => $faker->numberBetween(1, 30)
			));
		}
	}
}