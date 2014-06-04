<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsreousTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 48) as $index)
		{
			// $codes = array('50', '67', '63', '93', '66', '98', '99');
			$phone = $faker->phoneNumber;

			Usreou::create([
				'organization' => $faker->company,
				'in_id' => $index,
				'address_id' => $index,
				'ceo' => $faker->name,
				'phone' => $phone,
				'fax' => $phone,
				'email' => $faker->companyEmail,
				'registry_id' => $index,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			]);
		}

		foreach (Usreou::all() as $usreou) {
			$usreou->activities()->sync(
				array(
					$faker->randomNumber(1,48),
					$faker->randomNumber(1,48),
					$faker->randomNumber(1,48)
				)
			);
		}
	}

}
