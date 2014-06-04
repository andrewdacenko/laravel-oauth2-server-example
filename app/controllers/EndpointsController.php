<?php

class EndpointsController extends \BaseController {

	/**
	 * Display a listing of applications
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = Auth::user()->applications;

		return View::make('applications.index', compact('applications'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$application = Auth::user()->applications()->findOrFail($id);

		return View::make('endpoints.create', compact('application'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$application = Auth::user()->applications()->findOrFail($id);

		$validator = Validator::make($data = Input::only('redirect_uri'), Endpoint::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$endpoint = new Endpoint($data);

		$application->endpoints()->save($endpoint);

		return Redirect::route('applications.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Application::findOrFail($id);

		return View::make('applications.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = Application::findOrFail($id);

		return View::make('applications.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = Application::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Application::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('applications.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Application::destroy($id);

		return Redirect::route('applications.index');
	}

}