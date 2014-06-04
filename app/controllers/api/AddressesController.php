<?php namespace Controllers\Api;

use Address;
use Response;
use Validator;
use Input;

class AddressesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$addresses = Address::all();

        return Response::json($addresses);
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

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages())
				),
				400
			);
		}

		$address = new Address;

		$address->name = Input::get('name');
		$address->city_id = Input::get('city_id');
		$address->save();

		return Response::json($address);
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

		if (!$address) {
			return Response::json(array('error' => true), 404);
		}

        return Response::json($address);
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

		if (!$address) {
			return Response::json(array('error' => true), 404);
		}

		$rules = array('name' => 'required|min:2|max:50', 'city_id' => 'required|exists:cities,id');

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

		$address->name = Input::get('name');
		$address->city_id = Input::get('city_id');
		$address->save();

		return Response::json($address);
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

		if ($address) {
			$address->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
