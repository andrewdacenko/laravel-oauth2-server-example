<?php

class AuthController extends \BaseController {

	public function index()
	{
		return View::make('auth.index');
	}

	public function login()
	{
		if (Auth::attempt(array('username'=> Input::get('username'), 'password' => Input::get('password')), true)) {
			return Redirect::intended(URL::route('users.index'));
		}

		return Redirect::route('auth.login')->with('danger', 'Bad credentials');
	}

	public function create()
	{
		return View::make('auth.create');
	}

	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('auth.create');
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}