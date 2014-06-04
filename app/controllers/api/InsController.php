<?php namespace Controllers\Api;

use In;
use Response;
use Validator;
use Input;

class InsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ins = In::all();

        return Response::json($ins);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('in' => 'required|unique:ins,in|regex:/^\d{10}$/');

		$messages = array('in.regex' => 'The IN must be 10 decimals');

		$validation = Validator::make(Input::all(), $rules, $messages);

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages()->all())
				),
				400
			);
		}

		$in = new In;
		$in->in = (int)Input::get('in');
		$in->save();

		return Response::json($in);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $in = In::find($id);

        if (!$in) {
        	return Response::json(array('error' => true), 404);
        }

        return Response::json($in);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$in = In::find($id);

		$rules = array('in' => 'required|unique:ins,in,'.$id.'|regex:/^\d{10}$/');

		$messages = array('in.regex' => 'The IN must be 10 decimals');

		$validation = Validator::make(Input::all(), $rules, $messages);

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages()->all())
				),
				400
			);
		}

		$in->in = (int) Input::get('in');
		$in->save();

		return Response::json($in);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$in = In::find($id);

		if ($in) {
			$in->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
