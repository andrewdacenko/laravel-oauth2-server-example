{{Form::open(array( 'action' => 'ExtractsController@store'), 'POST', array(), false)}}
{{Form::label('series', 'Серия выписки', array())}}
{{Form::input('text', 'series', Input::old('series'), array('maxlength' => '2'))}}
{{Form::label('name', 'Номер выписки', array())}}
{{Form::input('text', 'name', Input::old('name'), array('maxlength' => '6'))}}

<?php $ins = In::all();
$result = array();
foreach ($ins as $in){
	$result[$in->id] = $in->in;
}
?>
{{Form::label('in_id', 'ИН')}}
{{Form::select('in_id', $result)}}
{{Form::submit()}}
{{Form::close()}}