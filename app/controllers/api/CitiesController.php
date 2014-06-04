<?php namespace Controllers\Api;

use City;
use Response;
use Validator;
use Input;

class CitiesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = City::all();

        return Response::json($cities);
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

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages())
				),
				400
			);
		}

		$city = new City;

		$city->name = Input::get('name');
		$city->region_id = Input::get('region_id');
		$city->save();

		return Response::json($city);
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

		if (!$city) {
			return Response::json(array('error' => true), 404);
		}

        return Response::json($city);
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
			return Response::json(array('error' => true), 404);
		}

		$rules = array('name' => 'required|min:2|max:50', 'region_id' => 'required|exists:regions,id');

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages())
				),
				400
			);
		}

		$city->name = Input::get('name');
		$city->region_id = Input::get('region_id');
		$city->save();

		return Response::json($city);
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

		if ($city) {
			$city->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
