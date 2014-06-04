<?php

class Extract extends Eloquent {

	protected $guarded = array();

	public $timestamps = true;

	public static $rules = array();

	public function in()
	{
		return $this->belongsTo('In');
	}

	protected function getCreatedAtAttribute($value)
    {
        $date = new DateTime($value);
        return $date->format('d.m.Y');
    }
}
