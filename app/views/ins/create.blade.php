{{Form::open(array( 'action' => 'InsController@store'), 'POST', array(), false)}}
{{Form::label('in', 'Идентификационный Номер', array())}}
{{Form::input('text', 'in', Input::old('in'), array())}}
{{Form::submit()}}
{{Form::close()}}