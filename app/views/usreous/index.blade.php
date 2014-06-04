<a class="btn add" href="{{action('UsreousController@create')}}">Добавить предприятие</a>

@if(count($usreous) > 0)
<ul>
	@foreach($usreous as $usreou)
	<li>
		<label>Предприятие:</label> "{{$usreou->organization}}"<br/> 
		<label>Руководитель:</label> {{$usreou->ceo}}<br/>
		<label>ИН:</label> {{$usreou->in->in}}<br/>
		<label>Адрес:</label> {{$usreou->address->name}}, г.{{$usreou->address->city->name}}, {{$usreou->address->city->region->name}} обл.<br/>
		<label>Телефон:</label> {{$usreou->phone}}<br/>
		<label>Факс:</label> {{$usreou->fax}}<br/>
		<label>E-mail:</label> {{$usreou->email}}<br/>
		<label>Регистратор:</label> {{$usreou->registry->name}}, {{$usreou->registry->address->name}}, г.{{$usreou->registry->address->city->name}}, {{$usreou->registry->address->city->region->name}} обл.<br/>
		<label>Последняя выписка:</label> 
			@foreach($usreou->in->lastExtract as $extract)
			{{$extract->series}} {{$extract->name}} {{$extract->created_at}}
			@endforeach
			<br/>
		<label>Виды деятельности:</label> 
			@foreach($usreou->activities as $activity)
			{{$activity->name}} 
			@endforeach
			<br/>
		<a href="{{action('UsreousController@edit', $usreou->id)}}">Ред</a>
		{{Form::open(['url' => action('UsreousController@destroy', $usreou->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
{{$usreous->links()}}
@else
Нет пока предприятий
@endif