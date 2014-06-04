<?php

class OAuthScope extends Eloquent {
	protected $table = 'oauth_scopes';

	public static $rules = [
		'scope' => 'required|unique:oauth_scopes,scope',
		'name' => 'required',
		'description' => 'required'
	];

	protected $fillable = ['scope', 'name', 'description'];

}