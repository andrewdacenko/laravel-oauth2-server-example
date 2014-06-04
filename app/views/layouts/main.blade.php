<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<style type="text/css">
	ul {padding: 0; margin: 0;}
	ul li {display: block; padding: 5px 0;}
	ul li form {display: inline}
	li {display: inline; padding: 20px;}
	label {padding-right: 10px; float: left; width: 200px;}
	select {display:block;}
	input {display: block; width: 300px;}
	input[type="submit"] {display: inline; width: auto;}
	.content {padding: 20px;}
	.btn.add {display: block; padding-bottom: 20px}
	.pagination ul li {display: inline; padding: 10px;}
	</style>
</head>
<body>
	<nav>
		<li><a href="{{action('RegionsController@index')}}">Области</a></li>
		<li><a href="{{action('CitiesController@index')}}">Города</a></li>
		<li><a href="{{action('AddressesController@index')}}">Адреса</a></li>
		<li><a href="{{action('InsController@index')}}">Идентификационные номера</a></li>
		<li><a href="{{action('RegistriesController@index')}}">Регистраторы</a></li>
		<li><a href="{{action('ExtractsController@index')}}">Выписки</a></li>
		<li><a href="{{action('ActivitiesController@index')}}">Виды деятельности</a></li>
		<li><a href="{{action('UsreousController@index')}}">Предприятия</a></li>
	</nav>

	<div class="content">{{$content}}</div>
</body>
</html>