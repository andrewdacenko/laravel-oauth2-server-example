<?php namespace Controllers\Api;

use Registry;
use Response;
use Validator;
use Input;

class RegistriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$registries = Registry::all();

        return Response::json($registries);
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

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages())
				)
			);
		}

		$registry = new Registry;

		$registry->name = Input::get('name');
		$registry->address_id = Input::get('address_id');
		$registry->save();

		return Response::json($registry->id);
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

		if (!$registry) {
			return Response::json(array('error' => true), 404);
		}

        return $registry;
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

		if (!$registry) {
			return Response::json(array('error' => true), 404);
		}

		$rules = array('name' => 'required|min:2|max:50', 'address_id' => 'required|exists:addresses,id');

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages())
				)
			);
		}

		$registry->name = Input::get('name');
		$registry->address_id = Input::get('address_id');
		$registry->save();

		return Response::json(array('response' => $registry->id));
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

		if ($registry) {
			$registry->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
