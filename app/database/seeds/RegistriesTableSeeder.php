<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RegistriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 48) as $index)
		{
			Registry::create([
				'name' => $faker->company,
				'address_id' => $index
			]);
		}
	}

}