{{Form::open(array( 'action' => 'ActivitiesController@store'), 'POST', array(), false)}}
{{Form::label('name', 'Название вида деятельности', array())}}
{{Form::input('text', 'name', Input::old('name'), array())}}
{{Form::submit()}}
{{Form::close()}}