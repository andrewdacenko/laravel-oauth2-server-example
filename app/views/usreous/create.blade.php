
{{Form::open(array( 'action' => 'UsreousController@store'), 'POST', array(), false)}}
{{Form::label('organization', 'Организация', array())}}
{{Form::input('text', 'organization', Input::old('organization'), array('maxlength' => '200'))}}

<?php $ins = In::all();
$result = array();
foreach ($ins as $in){
	$result[$in->id] = $in->in;
}
?>
{{Form::label('in_id', 'ИН')}}
{{Form::select('in_id', $result)}}

<?php $addresses = Address::all();
$result = array();
foreach ($addresses as $address){
	$result[$address->id] = $address->name . ', г.' . $address->city->name;
}
?>
{{Form::label('address_id', 'Адрес')}}
{{Form::select('address_id', $result)}}


{{Form::label('ceo', 'ФИО руководителя', array())}}
{{Form::input('text', 'ceo', Input::old('ceo'), array('maxlength' => '100'))}}

{{Form::label('phone', 'Контактный телефон', array())}}
{{Form::input('text', 'phone', Input::old('phone'), array('maxlength' => '10'))}}

{{Form::label('fax', 'Факс', array())}}
{{Form::input('text', 'fax', Input::old('fax'), array('maxlength' => '10'))}}

{{Form::label('email', 'E-mail', array())}}
{{Form::input('text', 'email', Input::old('email'), array())}}

<?php $registries = Registry::all();
$result = array();
foreach ($registries as $registry){
	$result[$registry->id] = $registry->name . ', ' . $registry->address->name . ', г.' . $registry->address->city->name;
}
?>
{{Form::label('registry_id', 'Регистратор', array())}}
{{Form::select('registry_id', $result)}}

<?php $activities = Activity::all();
$result = array();
$result[] = '-- Выберите --';
foreach ($activities as $activity){
	$result[$activity->id] = $activity->name;
}
?>
{{Form::label('activity_id', 'Вид деятельности', array())}}
{{Form::select('activity_id', $result, Input::old('activity_id'))}}

{{Form::submit('Добавить')}}
{{Form::close()}}