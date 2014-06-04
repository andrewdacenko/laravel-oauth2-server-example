{{Form::model($registry, ['url' => action('RegistriesController@update', $registry->id)])}}
<input type="hidden" name="_method" value="PUT">
{{Form::label('name', 'Имя регистратора', array())}}
{{Form::input('text', 'name')}}

<?php $addresses = Region::all();
$result = array();
foreach ($addresses as $address){
	$result[$address->id] = $address->name;
}
?>

{{Form::select('address_id', $result)}}
{{Form::submit()}}
{{Form::close()}}