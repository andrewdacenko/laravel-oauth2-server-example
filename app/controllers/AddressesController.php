<?php

class AddressesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$addresses = Address::all();

        return View::make('layouts.main')->nest('content', 'addresses.index', ['addresses' => $addresses]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'addresses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('name' => 'required|min:2|max:50', 'city_id' => 'required|exists:cities,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$address = new Address;

		$address->name = Input::get('name');
		$address->city_id = Input::get('city_id');
		$address->save();

		return Redirect::to(action('AddressesController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$address = Address::find($id);

        return View::make('layouts.main')->nest('content', 'addresses.show', ['address' => $address]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$address = Address::find($id);

		if (!$address){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'addresses.edit', ['address' => $address]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$address = Address::find($id);

		if (!$address){
			App::abort('404');
		}

		$rules = array('name' => 'required|min:2|max:50', 'city_id' => 'required|exists:cities,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$address->name = Input::get('name');
		$address->city_id = Input::get('city_id');
		$address->save();

		return Redirect::to(action('AddressesController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$address = Address::find($id);

		if($address){
			$address->delete();
		}
		
		return Redirect::back();
	}

}
