{{Form::open(array( 'action' => 'AddressesController@store'), 'POST', array(), false)}}
{{Form::label('name', 'Адрес', array())}}
{{Form::input('text', 'name', Input::old('name'), array())}}

<?php $cities = City::all();
$result = array();
foreach ($cities as $city){
	$result[$city->id] = $city->name;
}
?>

{{Form::select('city_id', $result)}}
{{Form::submit()}}
{{Form::close()}}