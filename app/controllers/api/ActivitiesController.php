<?php namespace Controllers\Api;

use Activity;
use Response;
use Validator;
use Input;

class ActivitiesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$activities = Activity::all();

        return $activities;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('name' => 'required|min:2|max:50');

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

		$activity = new Activity;
		$activity->name = $name;
		$activity->save();

		return Response::json($activity);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $activity = Activity::find($id);

		if (!$activity) {
			return Response::json(array('error' => true), 404);
		}

        return Response::json($activity);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$activity = Activity::find($id);

		if (!$activity) {
			return Response::json(array('error' => true), 404);
		}

		$rules = array('name' => 'required|min:2|max:50');

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

		$activity->name = Input::get('name');
		$activity->save();

		return Response::json($activity);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$activity = Activity::find($id);

		if ($activity) {
			$activity->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
