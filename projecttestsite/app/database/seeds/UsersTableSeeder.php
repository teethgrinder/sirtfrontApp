<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1) as $index)
		{
			User::create([
				'email' => 'burak.akin@gmail.com',
				'password' => Hash::make('admin'),
				'first_name' => 'Burak',
				'last_name' => 'Akın',
				'permissions' => '{"admin":1,"user":1,"superuser":-1}',

			]);
		}
	}

}