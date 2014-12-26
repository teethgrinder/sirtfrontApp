<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1) as $index)
		{
			Sentry::getGroupProvider()->create(array(
				'name'        => 'Admin',
				'permissions' => array(
					'admin' => 1,
					'users' => 1
				)
			));
		}
	}

}