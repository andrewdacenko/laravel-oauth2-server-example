<?php

class CitiesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('cities')->truncate();

		$cities = array(
			array(
				'name' => 'Вінниця', 
				'region_id' => 1,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Луцьк', 
				'region_id' => 2,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Дніпропетровськ', 
				'region_id' => 3,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Донецьк', 
				'region_id' => 4,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Житомир', 
				'region_id' => 5,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Ужгород', 
				'region_id' => 6,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Запоріжжя', 
				'region_id' => 7,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Івано-Франківськ', 
				'region_id' => 8,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Київ', 
				'region_id' => 9,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Кіровоград', 
				'region_id' => 10,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Луганськ', 
				'region_id' => 11,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Львів', 
				'region_id' => 12,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Миколаїв', 
				'region_id' => 13,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Одеса', 
				'region_id' => 14,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Полтава', 
				'region_id' => 15,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Рівне', 
				'region_id' => 16,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Суми', 
				'region_id' => 17,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Тернопіль', 
				'region_id' => 18,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Харків', 
				'region_id' => 19,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Херсон', 
				'region_id' => 20,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Хмельницький', 
				'region_id' => 21,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Черкаси', 
				'region_id' => 22,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Чернігів', 
				'region_id' => 23,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'name' => 'Чернівці', 
				'region_id' => 24,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		);

		// Uncomment the below to run the seeder
		foreach ($cities as $city) {
			City::create($city);
		}
	}

}
