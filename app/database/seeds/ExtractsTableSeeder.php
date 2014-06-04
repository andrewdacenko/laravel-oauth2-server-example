<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ExtractsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 40) as $index)
		{
			Extract::create([
				'name' => $faker->randomNumber(100000, 999999),
				'series' => Str::upper($faker->randomLetter . $faker->randomLetter),
				'in_id' => $index,
			]);
		}
	}

}