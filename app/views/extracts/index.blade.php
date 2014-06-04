<a class="btn add" href="{{action('ExtractsController@create')}}">Добавить выписку</a>

@if(count($extracts) > 0)
<ul>
	@foreach($extracts as $extract)
	<li>{{$extract->series}} {{$extract->name}}, ИН {{$extract->in->in}}, {{$extract->created_at}}
		<a href="{{action('ExtractsController@edit', $extract->id)}}">Ред</a>
		{{Form::open(['url' => action('ExtractsController@destroy', $extract->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока выписок
@endif