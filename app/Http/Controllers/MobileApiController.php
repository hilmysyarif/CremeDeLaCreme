<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mail;

use App\Models\Mission;
use App\Models\Message;

class MobileApiController extends Controller {

	/***************************
	 		MISSIONS
	***************************/
	public function indexMission(){
		$missions = Mission::all();
		return response()->json($missions);
	}

	/*** OLD ***/

	public function getActiveConversations(){
		$conversations = Conversation::getActiveConversations();
		return response()->json($conversations);
	}

	public function getMessagesOnAConversation($phone){
		$messages = Message::getMessagesWithPhone($phone);
		return response()->json($messages);
	}

	public function setMessageStatus(Request $request)
	{	
		if($request->isTyping == 1){
			if($conversation = Conversation::where('number','+'.$request->telephone)->first()){			
				$conversation->isTyping = 1;
				$conversation->save();
			}
		}
		else
		{
			if($conversation = Conversation::where('number','+'.$request->telephone)->first()){			
				$conversation->isTyping = 0;
				$conversation->save();
			}
		}
	}


}
