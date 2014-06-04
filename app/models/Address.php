<?php

class Address extends Eloquent {

	protected $guarded = array();

	public $timestamps = true;
	
	protected $with = ['city'];

	public static $rules = array();

	public function city()
	{
		return $this->belongsTo('City');
	}
}
