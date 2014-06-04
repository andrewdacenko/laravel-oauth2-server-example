<?php

class CitiesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = City::all();

        return View::make('layouts.main')->nest('content', 'cities.index', ['cities' => $cities]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'cities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('name' => 'required|min:2|max:50', 'region_id' => 'required|exists:regions,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$city = new City;

		$city->name = Input::get('name');
		$city->region_id = Input::get('region_id');
		$city->save();

		return Redirect::to(action('CitiesController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$city = City::find($id);

        return View::make('layouts.main')->nest('content', 'cities.show', ['city' => $city]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$city = City::find($id);

		if (!$city){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'cities.edit', ['city' => $city]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$city = City::find($id);

		if (!$city){
			App::abort('404');
		}

		$rules = array('name' => 'required|min:2|max:50', 'region_id' => 'required|exists:regions,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$city->name = Input::get('name');
		$city->region_id = Input::get('region_id');
		$city->save();

		return Redirect::to(action('CitiesController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$city = City::find($id);

		if($city){
			$city->delete();
		}
		
		return Redirect::back();
	}

}
