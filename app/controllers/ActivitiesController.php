<?php

class ActivitiesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$activities = Activity::all();

        return View::make('layouts.main')->nest('content', 'activities.index', ['activities' => $activities]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'activities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$name = Input::get('name', null);

		if(!$name){
			return Redirect::back();
		}

		$activity = new Activity;
		$activity->name = $name;
		$activity->save();

		return Redirect::to(action('ActivitiesController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('layouts.main')->nest('content', 'activities.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$activity = Activity::find($id);

		if (!$activity){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'activities.edit', ['activity' => $activity]);
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
			App::abort('404');
		}

		if (!Input::get('name', null)){
			return Redirect::back();
		}

		$activity->name = Input::get('name');
		$activity->save();

		return Redirect::to(action('ActivitiesController@index'));
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

		if($activity){
			$activity->delete();
		}
		
		return Redirect::back();
	}

}
