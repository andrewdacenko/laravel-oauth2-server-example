<?php

class UsreousController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usreous = Usreou::paginate(20);

        return View::make('layouts.main')->nest('content', 'usreous.index', ['usreous' => $usreous]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'usreous.create');
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
						'in_id' 		=> 'required|exists:ins,id',
						'address_id' 	=> 'required|exists:addresses,id',
						'ceo' 			=> 'required|between:2,100',
						'phone' 		=> 'alpha_num|between:7,10',
						'fax' 			=> 'alpha_num|between:7,10',
						'email' 		=> 'required|email',
						'registry_id' 	=> 'required|exists:registries,id',
						'activity_id'	=> 'required|exists:activities,id',
					);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
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

		return Redirect::to(action('UsreousController@index'));
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
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'usreous.show', ['usreou' => $usreou]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usreou = Usreou::find($id);

		if (!$usreou){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'usreous.edit', ['usreou' => $usreou]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usreou = Usreou::find($id);

		if (!$usreou){
			App::abort('404');
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
			return Redirect::back()->withInput()->withErrors($validation);
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

		return Redirect::to(action('UsreousController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usreou = Usreou::find($id);

		if($usreou){
			$usreou->delete();
		}
		
		return Redirect::back();
	}

}
