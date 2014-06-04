<a class="btn add" href="{{action('CitiesController@create')}}">Добавить город</a>

@if(count($cities) > 0)
<ul>
	@foreach($cities as $city)
	<li>{{$city->name}}, {{$city->region->name}} 
		<a href="{{action('CitiesController@edit', $city->id)}}">Ред</a>
		{{Form::open(['url' => action('CitiesController@destroy', $city->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока городов
@endif