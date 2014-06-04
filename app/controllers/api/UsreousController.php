<?php namespace Controllers\Api;

use Usreou;
use Response;
use Validator;
use Input;
use Log;

class UsreousController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usreous = Usreou::all();

        return Response::json($usreous);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array( 
			'organization' 	=> 'required|between:2, 200',
			'in_id' 		=> 'required|exists:ins,id|unique:usreous,in_id',
			'address_id' 	=> 'required|exists:addresses,id',
			'ceo' 			=> 'required|between:2,100',
			'phone' 		=> 'alpha_num|between:7,10',
			'fax' 			=> 'alpha_num|between:7,10',
			'email' 		=> 'required|email',
			'registry_id' 	=> 'required|exists:registries,id',
			'activity_id'	=> 'required|exists:activities,id',
		);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails()) {
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages()->all())
				), 400
			);
		}

		$usreou = new Usreou;

		$usreou->organization = Input::get('organization');
		$usreou->in_id = Input::get('in_id');
		$usreou->address_id = Input::get('address_id');
		$usreou->ceo = Input::get('ceo');
		$usreou->phone = Input::get('phone');
		$usreou->fax = Input::get('fax', null);
		$usreou->email = Input::get('email');
		$usreou->registry_id = Input::get('registry_id');
		$usreou->save();

		$usreou->activities()->attach(Input::get('activity_id'));

		return Response::json($usreou);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usreou = Usreou::find($id);

		if (!$usreou){
			return Response::json(array('error' => true), 404);
		}

        return Response::json($usreou);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usreou = Usreou::findOrFail($id);

		if (!$usreou){
			return Response::json(array('error' => true), 404);
		}

		$rules = array( 
			'organization' 	=> 'required|between:2, 200',
			'in_id' 		=> 'required|exists:ins,id',
			'address_id' 	=> 'required|exists:addresses,id',
			'ceo' 			=> 'required|between:2,100',
			'phone' 		=> 'alpha_num|between:7,10',
			'fax' 			=> 'alpha_num|between:7,10',
			'email' 		=> 'required|email',
			'registry_id' 	=> 'required|exists:registries,id',
			'activity_id'	=> 'required|exists:activities,id'
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Response::json(
				array(
					'error' => true,
					'errors' => array_flatten($validation->messages()->all())
				), 400
			);
		}

		$usreou->organization = Input::get('organization');
		$usreou->in_id = Input::get('in_id');
		$usreou->address_id = Input::get('address_id');
		$usreou->ceo = Input::get('ceo');
		$usreou->phone = Input::get('phone');
		$usreou->fax = Input::get('fax', null);
		$usreou->email = Input::get('email');
		$usreou->registry_id = Input::get('registry_id');
		$usreou->save();

		$usreou->activities()->sync(array(Input::get('activity_id')));

		return Response::json($usreou);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usreou = Usreou::findOrFail($id);

		if($usreou){
			$usreou->delete();
			return Response::json(array('success' => true), 200);
		}
		
		return Response::json(array('error' => true), 404);
	}

}
