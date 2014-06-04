{{Form::model($region, ['url' => action('RegionsController@update', $region->id)])}}
<input type="hidden" name="_method" value="PUT">
{{Form::label('name', 'Имя области', array())}}
{{Form::input('text', 'name')}}

{{Form::submit()}}
{{Form::close()}}