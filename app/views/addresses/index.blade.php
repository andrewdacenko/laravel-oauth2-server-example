<a class="btn add" href="{{action('AddressesController@create')}}">Добавить адрес</a>

@if(count($addresses) > 0)
<ul>
	@foreach($addresses as $address)
	<li>{{$address->name}}, г.{{$address->city->name}}
		<a href="{{action('AddressesController@edit', $address->id)}}">Ред</a>
		{{Form::open(['url' => action('AddressesController@destroy', $address->id), 'method' => 'DELETE'])}}
		{{Form::submit('Удалить')}}
		{{Form::close()}}
	</li>
	@endforeach
</ul>
@else
Нет пока адресов
@endif