{{Form::model($activity, ['url' => action('ActivitiesController@update', $activity->id)])}}
<input type="hidden" name="_method" value="PUT">
{{Form::label('name', 'Название вида деятельности', array())}}
{{Form::input('text', 'name')}}

{{Form::submit()}}
{{Form::close()}}