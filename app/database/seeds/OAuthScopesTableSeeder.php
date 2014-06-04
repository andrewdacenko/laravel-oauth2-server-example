<?php

class OAuthScopesTableSeeder extends Seeder {

	public function run()
	{
		OAuthScope::create([
			'scope' => 'basic', 
			'name' => 'Basic scope', 
			'description' => 'description'
		]);
	}

}