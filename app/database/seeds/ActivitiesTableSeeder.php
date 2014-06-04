<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ActivitiesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 48) as $index)
		{
			Activity::create([
				'name' => $faker->catchPhrase,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			]);
		}
	}

}