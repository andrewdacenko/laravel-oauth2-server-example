{{ var_dump($errors) }}

{{Form::open(array( 'action' => 'CitiesController@store'), 'POST', array(), false)}}
{{Form::label('name', 'Имя города', array())}}
{{Form::input('text', 'name', Input::old('name'), array())}}

<?php $regions = Region::all();
$result = array();
foreach ($regions as $region){
	$result[$region->id] = $region->name;
}
?>

{{Form::select('region_id', $result)}}
{{Form::submit()}}
{{Form::close()}}