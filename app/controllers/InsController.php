<?php

class InsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ins = In::all();

        return View::make('layouts.main')->nest('content', 'ins.index', ['ins' => $ins]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'ins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('in' => 'required|unique:ins,in|integer');

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$in = new In;
		$in->in = (int)Input::get('in');
		$in->save();

		return Redirect::to(action('InsController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('layouts.main')->nest('content', 'ins.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$in = In::find($id);

		if (!$in){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'ins.edit', ['in' => $in]);
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

		$rules = array('in' => 'required|unique:ins,in,'.$id.'|integer');
		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		}

		$in->in = (int) Input::get('in');
		$in->save();

		return Redirect::to(action('InsController@index'));
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

		if($in){
			$in->delete();
		}
		
		return Redirect::back();
	}

}
