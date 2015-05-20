<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Mission;

class MissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$missions = Mission::all();
		return view('admin.missions.index')->with(compact("missions"));
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
		$mission = Mission::find($id);
		$mission->statusId = $mission->status;
		$mission->status = $mission->getStatus();
		return response()->json($mission);

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
	public function update(Request $request, $id)
	{
		$id = $request->id;
		if($mission = Mission::find($id)){
			$mission->description = $request->description;
			$mission->status = $request->status;
			$mission->deadline = $request->deadline.' 00:00:00';
			$mission->save();
			return redirect()->back()->with('success', 'Mission modifiée avec succès');
		}
		else{
			return redirect()->back()->with('error', 'Tentative de hack, merci de ré-essayer');
		}
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

	/**
	 * Showing the differents statistics of an user
	 * @return Response
	 */
	public function showMyStats()
	{
		//
	}

}
