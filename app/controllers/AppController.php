<?php

class AppController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getCities()
	{
		$cities = DB::select("select distinct(name) from cities");
		return Response::json($cities);
	}

	public function getRoutes($city) {
		$trans = DB::select('select transport_corp from cities where name="'.$city.'"');
		$table = $city.'_'.$trans[0]->transport_corp.'_info';
		$routes = DB::select('select route from '.$table);
		return Response::json($routes);
	}

	public function getStops($city) {
		$route = Input::get('route');
		$trans = DB::select('select transport_corp from cities where name="'.$city.'"');
		$routeTable = $city.'_'.$trans[0]->transport_corp.'_route';
		$stopTable = $city.'_'.$trans[0]->transport_corp.'_stop';
		$stops = DB::select("select * from $routeTable as route, $stopTable as stop where stop.stop_id=route.stop_id and route='$route'");
		return Response::json($stops);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
