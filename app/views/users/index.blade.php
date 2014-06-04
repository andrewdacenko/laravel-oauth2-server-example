@extends('layouts.default')

@section('content')
<h1 class="page-header">All users</h1>

<p>{{ link_to_route('users.create', 'Create user') }}</p>

@if ($users->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<td>{{ $user->username }}</td>
				<td>
					
				</td>
			@endforeach
		</tbody>
	</table>

@else
	No users yet
@endif

@stop