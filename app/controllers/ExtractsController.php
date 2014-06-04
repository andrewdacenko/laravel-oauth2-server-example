<?php

class ExtractsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$extracts = Extract::all();

        return View::make('layouts.main')->nest('content', 'extracts.index', ['extracts' => $extracts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'extracts.create');
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

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$extract = new Extract;

		$extract->name = Input::get('name');
		$extract->series = Input::get('series');
		$extract->in_id = Input::get('in_id');
		$extract->save();

		return Redirect::to(action('ExtractsController@index'));
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

        return View::make('layouts.main')->nest('content', 'extracts.show', ['extract' => $extract]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$extract = Extract::find($id);

		if (!$extract){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'extracts.edit', ['extract' => $extract]);
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

		if (!$extract){
			App::abort('404');
		}

		$rules = array( 'name' => 'required|integer', 
						'series' => 'required|size:2', 
						'in_id' => 'required|exists:ins,id');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$extract->name = Input::get('name');
		$extract->series = Input::get('series');
		$extract->in_id = Input::get('in_id');
		$extract->save();

		return Redirect::to(action('ExtractsController@index'));
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

		if($extract){
			$extract->delete();
		}
		
		return Redirect::back();
	}

}
