<?php

class City extends Eloquent {

	protected $guarded = array();

	public $timestamps = true;
	
	protected $with = ['region'];

	public static $rules = array();

	public function region()
	{
		return $this->belongsTo('Region');
	}
}
