<?php

class OAuthClientsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('oauth_clients')->insert(array(
			'id' => 'i1ZntheKFSxffgvXV1nK5d',
			'secret' => '86Qjhv8TQULidUMyBz3sN5NwowxJ7C3WvHhEHAYW',
			'name' => 'Main',
			'user_id' => User::first()->id,
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		));
	}

}