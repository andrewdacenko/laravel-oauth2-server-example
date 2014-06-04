<?php

class Endpoint extends Eloquent {

	protected $table = 'oauth_client_endpoints';

	public static $rules = [
		'redirect_uri' => 'required',
	];

	protected $fillable = ['client_id', 'redirect_uri'];
}
