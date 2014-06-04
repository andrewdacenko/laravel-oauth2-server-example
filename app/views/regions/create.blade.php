{{Form::open(array( 'action' => 'RegionsController@store'), 'POST', array(), false)}}
{{Form::label('name', 'Имя области', array())}}
{{Form::input('text', 'name', Input::old('name'), array())}}
{{Form::submit()}}
{{Form::close()}}