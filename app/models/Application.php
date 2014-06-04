<?php

class Application extends Eloquent {

	protected $table = 'oauth_clients';

	public $incrementing = false;

	 // protected $primaryKey = null;

	public static $rules = [
		'name' => 'required',
	];

	protected $fillable = ['name', 'id', 'secret'];

	public function endpoints()
	{
		return $this->hasMany('Endpoint', 'client_id');
	}
}