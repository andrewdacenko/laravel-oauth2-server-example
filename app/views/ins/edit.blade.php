{{Form::model($in, ['url' => action('InsController@update', $in->id)])}}
<input type="hidden" name="_method" value="PUT">
{{Form::label('in', 'Идентификационный Номер', array())}}
{{Form::input('text', 'in')}}
{{Form::submit()}}
{{Form::close()}}