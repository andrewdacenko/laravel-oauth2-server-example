<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RegionsTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('AddressesTableSeeder');
		$this->call('InsTableSeeder');
		$this->call('RegistriesTableSeeder');
		$this->call('ExtractsTableSeeder');
		$this->call('ActivitiesTableSeeder');
		$this->call('UsreousTableSeeder');
		$this->call('OAuthScopesTableSeeder');
		$this->call('OAuthClientsTableSeeder');
		$this->call('OAuthClientEndpointsTableSeeder');
	}

}