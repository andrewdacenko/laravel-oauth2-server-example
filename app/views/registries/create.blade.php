{{Form::open(array( 'action' => 'RegistriesController@store'), 'POST', array(), false)}}
{{Form::label('name', 'Имя регистратора', array())}}
{{Form::input('text', 'name', Input::old('name'), array())}}

<?php $addresses = Address::all();
$result = array();
foreach ($addresses as $address){
	$result[$address->id] = $address->name;
}
?>

{{Form::select('address_id', $result)}}
{{Form::submit()}}
{{Form::close()}}