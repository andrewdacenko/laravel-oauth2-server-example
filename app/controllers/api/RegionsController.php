<?php namespace Controllers\Api;

use Region;
use Response;
use Validator;
use Input;

class RegionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = Region::all();

        return Response::json($regions);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array( 'name' => 'required');

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

		$region = new Region;
		$region->name = Input::get('name');
		$region->save();

		return Response::json($region);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$region = Region::find($id);

		if (!$region) {
			return Response::json(array('error' => true), 404);
		}

        return Response::json($region);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$region = Region::find($id);

		if (!$region) {
			return Response::json(array('error' => true), 404);
		}

		$rules = array( 'name' => 'required');

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

		$region->name = Input::get('name');
		$region->save();

		return Response::json($region);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$region = Region::find($id);

		if ($region) {
			$region->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

	
}
