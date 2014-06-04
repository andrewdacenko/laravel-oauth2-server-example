<?php

class ApplicationsController extends \BaseController {

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
	public function create()
	{
		return View::make('applications.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('name'), Application::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['id'] = 'i' . Auth::user()->id . Str::random(20);
		$data['secret'] = Str::random(40);

		$application = new Application($data);

		Auth::user()->applications()->save($application);

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