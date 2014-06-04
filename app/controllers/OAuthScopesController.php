<?php

class OAuthScopesController extends \BaseController {

	/**
	 * Display a listing of oauth_scopes
	 *
	 * @return Response
	 */
	public function index()
	{
		$oauth_scopes = OAuthScope::all();

		return View::make('oauth_scopes.index', compact('oauth_scopes'));
	}

	/**
	 * Show the form for creating a new oauth_scope
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('oauth_scopes.create');
	}

	/**
	 * Store a newly created oauth_scope in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), OAuthScope::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		OAuthScope::create($data);

		return Redirect::route('oauth_scopes.index');
	}

	/**
	 * Display the specified oauth_scope.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$oauth_scope = OAuthScope::findOrFail($id);

		return View::make('oauth_scopes.show', compact('oauth_scope'));
	}

	/**
	 * Show the form for editing the specified oauth_scope.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oauth_scope = OAuthScope::findOrFail($id);

		return View::make('oauth_scopes.edit', compact('oauth_scope'));
	}

	/**
	 * Update the specified oauth_scope in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$oauth_scope = OAuthScope::findOrFail($id);

		$validator = Validator::make($data = Input::all(), OAuthScope::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$oauth_scope->update($data);

		return Redirect::route('oauth_scopes.index');
	}

	/**
	 * Remove the specified oauth_scope from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OAuthScope::destroy($id);

		return Redirect::route('oauth_scopes.index');
	}

}
