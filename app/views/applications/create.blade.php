@extends('layouts.default')

@section('content')
<h1 class="page-header">New application</h1>

{{ Form::open(['route' => 'applications.store']) }}
<div class="form-group">
	{{ Form::label('name', 'Application name', array()) }}
	{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
</div>

{{ Form::close() }}

@stop