<a class="btn add" href="{{action('ActivitiesController@create')}}">Добавить вид деятельности</a>

@if(count($activities) > 0)
<ul>
	@foreach($activities as $activity)
	<li>{{$activity->name}}
		<a href="{{action('ActivitiesController@edit', $activity->id)}}">Ред</a>
		{{Form::open(['url' => action('ActivitiesController@destroy', $activity->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока видов деятельности
@endif 