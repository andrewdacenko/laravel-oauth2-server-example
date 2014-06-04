<?php 

// use Services\Usreou\UsreouFacade as Usreou;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$id = Input::get('in', null);
	$in = null;
	$usreou = null;

	if ($id) {
		$in = In::where('in', '=', (int)$id)->first();
	}
	
	if ($in) {
		$usreou = Usreou::where('in_id', '=', $in->id)->first();
	}
	
	return View::make('hello', ['usreou' => $usreou, 'id' => $id]);
});

Route::group(['before' => 'auth'], function()
{
	Route::resource('regions', 'RegionsController');

	Route::resource('cities', 'CitiesController');

	Route::resource('addresses', 'AddressesController');

	Route::resource('ins', 'InsController');

	Route::resource('registries', 'RegistriesController');

	Route::resource('extracts', 'ExtractsController');

	Route::resource('activities', 'ActivitiesController');

	Route::resource('usreous', 'UsreousController');

	Route::get('seed', function()
	{
		return View::make('layouts.main')->with('content', '');
	});

});

Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@index']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
Route::post('auth/login', ['before' => 'csrf', 'uses' => 'AuthController@login']);

Route::group(['before' => 'auth'], function()
{
    Route::resource('users', 'UsersController');
    Route::resource('applications', 'ApplicationsController');
    Route::resource('applications.endpoints', 'EndpointsController');
});

Route::group(array('prefix' => 'api', 'before' => 'oauth'), function()
{
	Route::get('/', function()
	{
		$routeCollection = Route::getRoutes();

		$routes = array(
		);

		foreach ($routeCollection as $value) {
			if (preg_match('/^api\/[a-z]+$/', $value->getPath())) {
				if ($value->getMethods()[0] === 'GET'){
					$url = $value->getPath();
					$url = preg_replace('/^api\//', '', $url);
					$route = array('table' => $url, 'url' => route('api.'.$url.'.index'));
			    	array_push($routes, (object)$route);
				}
			}
		}

		return Response::json($routes);
		return Response::json(array('response' => 1), 200);
	});

	Route::resource('activities', 'Controllers\Api\ActivitiesController');
	Route::resource('addresses', 'Controllers\Api\AddressesController');
	Route::resource('cities', 'Controllers\Api\CitiesController');
	Route::resource('extracts', 'Controllers\Api\ExtractsController');
	Route::resource('ins', 'Controllers\Api\InsController');
	Route::resource('regions', 'Controllers\Api\RegionsController');
	Route::resource('registries', 'Controllers\Api\RegistriesController');
	Route::resource('usreous', 'Controllers\Api\UsreousController');
});


Route::post('oauth/access_token', function()
{
    return AuthorizationServer::performAccessTokenFlow();
});

Route::get('/oauth/authorize', array('before' => 'check-authorization-params|auth', function()
{
    // get the data from the check-authorization-params filter
    $params = Session::get('authorize-params');

    // get the user id
    $params['user_id'] = Auth::user()->id;

    $application = Application::find($params['client_id']);

    // display the authorization form
    return View::make('oauth.authorization-form', array('params' => $params, 'application' => $application));
}));

Route::post('/oauth/authorize', array('before' => 'check-authorization-params|auth|csrf', function()
{
    // get the data from the check-authorization-params filter
    $params = Session::get('authorize-params');

    // get the user id
    $params['user_id'] = Auth::user()->id;

    // check if the user approved or denied the authorization request
    if (Input::get('approve') !== null) {

        $code = AuthorizationServer::newAuthorizeRequest('user', $params['user_id'], $params);

        Session::forget('authorize-params');

        return Redirect::to(AuthorizationServer::makeRedirectWithCode($code, $params));
    }

    if (Input::get('deny') !== null) {

        Session::forget('authorize-params');

        return Redirect::to(AuthorizationServer::makeRedirectWithError($params));
    }
}));

