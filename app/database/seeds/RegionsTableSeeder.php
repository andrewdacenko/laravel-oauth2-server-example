<?php

class RegionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('regions')->truncate();

		$regions = array(
			array(
				'name' => 'Вінницька область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Волинська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Дніпропетровська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Донецька область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Житомирська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Закарпатська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Запорізька область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Івано-Франківська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Київська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Кіровоградська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Луганська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Львівська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Миколаївська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Одеська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Полтавська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Рівненська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Сумська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Тернопільська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Харківська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Херсонська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Хмельницька область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Черкаська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Чернігівська область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Чернівецька область',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		);

		// Uncomment the below to run the seeder
		foreach ($regions as $region) {
			Region::create($region);
		}
	}

}
