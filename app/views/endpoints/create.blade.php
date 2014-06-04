@extends('layouts.default')

@section('content')
<h1 class="page-header">New endpoint for "{{{ $application->name }}}" application</h1>

{{ Form::open(['route' => ['applications.endpoints.store', $application->id]]) }}
<div class="form-group">
	{{ Form::label('redirect_uri', 'Redirect uri', array()) }}
	{{ Form::text('redirect_uri', Input::old('redirect_uri'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
</div>

{{ Form::close() }}

@stop