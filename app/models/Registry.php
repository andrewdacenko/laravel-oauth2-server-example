<?php

class Registry extends Eloquent {

	protected $guarded = array();

	public $timestamps = true;

	protected $with = ['address'];

	public static $rules = array();

	public function address()
	{
		return $this->belongsTo('Address');
	}
}
