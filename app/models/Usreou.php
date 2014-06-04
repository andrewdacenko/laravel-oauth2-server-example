<?php

class Usreou extends Eloquent {

	protected $guarded = array();

	public $timestamps = true;

	protected $with = ['in', 'address', 'registry', 'activities', 'idno', 'in.lastExtract'];

	public static $rules = array();

	public function in()
	{
		return $this->belongsTo('In');
	}

	public function idno()
	{
		return $this->belongsTo('In');
	}

	public function address()
	{
		return $this->belongsTo('Address');
	}

	public function registry()
	{
		return $this->belongsTo('Registry');
	}

	public function activities()
	{
		return $this->belongsToMany('Activity');
	}
}
