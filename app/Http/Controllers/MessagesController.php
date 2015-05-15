<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Conversation;

use Auth;

class MessagesController extends Controller {

	private $smsGateway;

	public function __construct(smsGateway $smsGateway){
		$this->smsGateway = $smsGateway;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.messages.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.messages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Verifications sur le telephone
		$telephoneClean = $request->telephone;
		if(substr($telephoneClean, 0, 1) == ' '){
			$telephoneClean = substr($telephoneClean, 1);
		}
		if(substr($telephoneClean,0,2) == '33'){
			$telephoneClean = '+'.$telephoneClean;
		}


		$request->message = str_replace("'", "’", $request->message);

		$message = new Message;
		$message->message_id = 0;
		$message->telephone = $telephoneClean;
		$message->message = $request->message;
		$message->sender_id = Auth::user()->id;
		$message->status = 'success';
		$message->save();
		$send = $this->smsGateway->sendMessageToNumber($request->telephone, $request->message);
		$message->message_id = $send['response']['result']['success'][0]['id'];
		$message->save();

		// Get Conversation
		if($conversation = Conversation::where('number', $telephoneClean)->first())
		{
			$conversation->hasNewMessage = 0;
			$conversation->save();
		}

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
