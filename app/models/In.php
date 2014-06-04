<?php

class In extends Eloquent {
	
	protected $guarded = array();

	public $timestamps = true;

	protected $with = ['extracts', 'lastExtract'];

	public static $rules = array();

	public function extracts()
	{
		return $this->hasMany('Extract')->orderBy('id', 'desc');
	}

	public function lastExtract()
	{
		return $this->hasMany('Extract')->orderBy('id', 'desc');
	}
}
