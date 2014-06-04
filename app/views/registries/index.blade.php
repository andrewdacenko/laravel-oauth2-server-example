<a class="btn add" href="{{action('RegistriesController@create')}}">Добавить регистратора</a>

@if(count($registries) > 0)
<ul>
	@foreach($registries as $registry)
	<li>{{$registry->name}}, {{$registry->address->name}}, г.{{$registry->address->city->name}}, {{$registry->address->city->region->name}} обл.
		<a href="{{action('RegistriesController@edit', $registry->id)}}">Ред</a>
		{{Form::open(['url' => action('RegistriesController@destroy', $registry->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока городов
@endif