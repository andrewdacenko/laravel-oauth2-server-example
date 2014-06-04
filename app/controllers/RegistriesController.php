<?php

class RegistriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$registries = Registry::all();

        return View::make('layouts.main')->nest('content', 'registries.index', ['registries' => $registries]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'registries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('name' => 'required|min:2|max:50', 'address_id' => 'required|exists:addresses,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$registry = new Registry;

		$registry->name = Input::get('name');
		$registry->address_id = Input::get('address_id');
		$registry->save();

		return Redirect::to(action('RegistriesController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$registry = Registry::find($id);

        return View::make('layouts.main')->nest('content', 'registries.show', ['registry' => $registry]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$registry = Registry::find($id);

		if (!$registry){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'registries.edit', ['registry' => $registry]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$registry = Registry::find($id);

		if (!$registry){
			App::abort('404');
		}

		$rules = array('name' => 'required|min:2|max:50', 'address_id' => 'required|exists:addresses,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$registry->name = Input::get('name');
		$registry->address_id = Input::get('address_id');
		$registry->save();

		return Redirect::to(action('RegistriesController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$registry = Registry::find($id);

		if($registry){
			$registry->delete();
		}
		
		return Redirect::back();
	}

}
