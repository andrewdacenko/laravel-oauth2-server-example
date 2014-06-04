<?php

use Faker\Factory as Faker;

class AddressesTableSeeder extends Seeder {

	public function run()
	{	
		$faker = Faker::create();

		foreach(range(0, 48) as $index)
		{
			$id = $index % 24 + 1;
			Address::create([
				'name' => $faker->streetName . ' д.' .
					 $faker->randomNumber(1,300) . ', кв. ' . $faker->randomNumber(1,500),
				'city_id' => $id,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			]);
		}
	}

}
