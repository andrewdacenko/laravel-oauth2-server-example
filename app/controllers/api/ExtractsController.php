<?php namespace Controllers\Api;

use Extract;
use Response;
use Validator;
use Input;

class ExtractsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$extracts = Extract::all();

        return Response::json($extracts);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array( 'name' => 'required|alpha_num|size:6',
						'series' => 'required|size:2',
						'in_id' => 'required|exists:ins,id');

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

		$extract = new Extract;

		$extract->name = Input::get('name');
		$extract->series = Input::get('series');
		$extract->in_id = Input::get('in_id');
		$extract->save();

		return Response::json($extract);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$extract = Extract::find($id);

		if (!$extract) {
			return Response::json(array('error' => true), 404);
		}

        return Response::json($extract);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$extract = Extract::find($id);

		if (!$extract) {
			return Response::json(array('error' => true), 404);
		}

		$rules = array( 'name' => 'required|integer', 
						'series' => 'required|size:2', 
						'in_id' => 'required|exists:ins,id');

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

		$extract->name = Input::get('name');
		$extract->series = Input::get('series');
		$extract->in_id = Input::get('in_id');
		$extract->save();

		return Response::json($extract);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$extract = Extract::find($id);

		if ($extract) {
			$extract->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
