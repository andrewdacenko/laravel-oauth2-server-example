<!DOCTYPE html>
<html>
<head>
	<title>Reg server</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		@include('misc.errors')
		@include('misc.messages')
		<div class="col-md-8 col-md-offset-2">
			<h1 class="page-header text-center">"{{ $application->name }}" wants permissions:</h1>
			@foreach ($params['scopes'] as $scope)
				<div class="media">
					<a class="pull-left" href="#">
						<!-- <img class="media-object" src="..." alt="..."> -->
					</a>
					<div class="media-body">
						<h4 class="media-heading">{{ $scope['name'] }}</h4>
						<p>{{ $scope['description'] }}</p>
					</div>
				</div>
			@endforeach
			<div class="clearfix"></div>
			<hr>
			<form method="POST" class="col-sm-6">
			{{ Form::token() }}
			{{ Form::hidden('approve', 1) }}
			{{ Form::submit('Accept', array('class' => 'btn btn-block btn-success')) }}
			{{ Form::close() }}

			{{ Form::open(['class' => 'col-sm-6']) }}
			{{ Form::hidden('deny', 1) }}
			{{ Form::submit('Deny', array('class' => 'btn btn-block btn-danger')) }}
			{{ Form::close() }}
			<hr>
			<hr>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-latest.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>