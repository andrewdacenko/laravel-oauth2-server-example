<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class InsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 48) as $index)
		{
			In::create([
				'in' => $faker->randomNumber(1000000000, 9999999999)
			]);
		}
	}

}