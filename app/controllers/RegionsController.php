<?php

class RegionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = Region::paginate();

        return View::make('layouts.main')->nest('content', 'regions.index', ['regions' => $regions]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('layouts.main')->nest('content', 'regions.create');
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

		$region = new Region;
		$region->name = $name;
		$region->save();

		return Redirect::to(action('RegionsController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('layouts.main')->nest('content', 'regions.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$region = Region::find($id);

		if (!$region){
			App::abort('404');
		}

        return View::make('layouts.main')->nest('content', 'regions.edit', ['region' => $region]);
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

		if (!$region){
			App::abort('404');
		}

		if(!Input::get('name', null)){
			return Redirect::back();
		}

		$region->name = Input::get('name');
		$region->save();

		return Redirect::to(action('RegionsController@index'));
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

		if($region){
			$region->delete();
		}
		
		return Redirect::back();
	}

}
