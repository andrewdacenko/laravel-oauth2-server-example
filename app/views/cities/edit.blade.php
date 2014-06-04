{{Form::model($city, ['url' => action('CitiesController@update', $city->id)])}}
<input type="hidden" name="_method" value="PUT">
{{Form::label('name', 'Имя области', array())}}
{{Form::input('text', 'name')}}

<?php $regions = Region::all();
$result = array();
foreach ($regions as $region){
	$result[$region->id] = $region->name;
}
?>

{{Form::select('region_id', $result)}}
{{Form::submit()}}
{{Form::close()}}