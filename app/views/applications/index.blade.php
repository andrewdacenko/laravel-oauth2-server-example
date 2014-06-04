@extends('layouts.default')

@section('content')
<h1 class="page-header">Your applications</h1>

<p>{{ link_to_route('applications.create', 'Create application') }}</p>

@if ($applications->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Application Id</th>
				<th>Application Secret</th>
				<th>Endpoints</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($applications as $application)
			<tr>
				<td>{{ $application->name }}</td>
				<td>{{ $application->id }}</td>
				<td>{{ $application->secret }}</td>
				<td>
					<p>{{ link_to_route('applications.endpoints.create', 'new',$application->id) }}</p>
					@if ($application->endpoints->count())
						@foreach ($application->endpoints as $endpoint)
							<li>{{ $endpoint->redirect_uri }}</li>
						@endforeach
					@else
						No endpoints yet
					@endif
				</td>
				<td>
					{{ Form::open(['method' => 'DELETE', 'route' => array('applications.destroy', $application->id)]) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@else
	No applications yet
@endif

@stop