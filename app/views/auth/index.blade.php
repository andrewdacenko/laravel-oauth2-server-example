@extends('layouts.default')

@section('content')

<div class="col-md-6 col-md-offset-3">
	<h1 class="page-header text-center">Log in</h1>
	{{ Form::open() }}
	<div class="form-group">
		{{ Form::label('username', 'Username', array()) }}
		{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password', array()) }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Sign In', array('class' => 'btn btn-success')) }}
	</div>
	{{ Form::close() }}
</div>

@stop