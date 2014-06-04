<a class="btn add" href="{{action('InsController@create')}}">Добавить идентификационный номер</a>

@if(count($ins) > 0)
<ul>
	@foreach($ins as $in)
	<li>{{$in->in}}
		<a href="{{action('InsController@edit', $in->id)}}">Ред</a>
		{{Form::open(['url' => action('InsController@destroy', $in->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока идентификационных номеров
@endif