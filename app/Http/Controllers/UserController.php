<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return view('admin.users.index')->with(compact("users"));
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
		$user = User::find($id);
		return view('admin.users.edit')->with(compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
	 */
    public function update(Request $request, $id)
	{
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->rank = $request->rank;
		if($request->password){
			$user->password = bcrypt($request['password']);
		}
		$user->save();
		return redirect('admin/users')->with('message','Utilisateur modifié avec succès');
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
