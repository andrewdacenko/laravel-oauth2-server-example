<?php

class OAuthClientEndpointsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('oauth_client_endpoints')->insert(array(
			'client_id' => 'i1ZntheKFSxffgvXV1nK5d',
			'redirect_uri' => 'http://localhost:8080/authenticated',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		));
	}

}