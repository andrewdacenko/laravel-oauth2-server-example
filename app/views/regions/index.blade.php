<a class="btn add" href="{{action('RegionsController@create')}}">Добавить область</a>

@if(count($regions) > 0)
<ul>
	@foreach($regions as $region)
	<li>{{$region->name}}
		<a href="{{action('RegionsController@edit', $region->id)}}">Ред</a>
		{{Form::open(['url' => action('RegionsController@destroy', $region->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока областей
@endif