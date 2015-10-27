<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
	public function run()
	{
		\DB::table('users')->insert(array(
			'first_name' => 'Moisés',
			'last_name' => 'Alvarado',
			'email' => 'moisesalvarado84@gmail.com',
			'password' => \Hash::make('alvarado'),
			'type'	=> 'admin'
		));

		\DB::table('user_profiles')->insert(array(
				'user_id' => 1,
				'birthdate' => '1991/09/23'
			));
	}

}