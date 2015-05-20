<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mail;

use App\Models\Conversation;
use App\Models\Message;

class ApiController extends Controller {

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

	public function getStatusMessage($telephone){
		$conversation = Conversation::getConversation($telephone);
		return response()->json($conversation);
	
	}

	public function getMessage(Request $request){

		$telephone = $request->contact['number'];
		$id_message = $request->id;

		// First : On check si la conversation peut exister
		$conversation = Conversation::where('number', '=', $telephone)->first();
		if($conversation){
			$conversation->hasNewMessage = 1;
			$conversation->updated_at = date('Y-m-d H:i:s');
		}
		else{
			$conversation = new Conversation;
			$conversation->number = $telephone;
			$conversation->active = 1;
			$conversation->hasNewMessage = 1;
			$conversation->isTyping = 0;
		}

		$conversation->save();

		$message = new Message;
		$message->message_id = $id_message;
		$message->telephone = $telephone;
		$message->message = $request->message;
		$message->sender_id = 0;
		$message->status = 'success';
		$message->save();

	}

	public function setMessageRead(Request $request){
		// Verifications sur le telephone
		$telephoneClean = $request->telephone;
		if(substr($telephoneClean, 0, 1) == ' '){
			$telephoneClean = substr($telephoneClean, 1);
		}
		if(substr($telephoneClean,0,2) == '33'){
			$telephoneClean = '+'.$telephoneClean;
		}

		$conversation = Conversation::where('number', $telephoneClean)->first();
		$conversation->hasNewMessage = 0;
		$conversation->save();
	}

	public function softDeleteMessage(Request $request){
		$message = Message::find($request->messageId);
		$message->delete();
	}

	public function softDeleteConversation(Request $request){
		$messages = Message::where('telephone', '=' ,'+'.$request->telephone)->get();
		foreach ($messages as $key => $value) {
			$value->delete();
		}

		$conversation = Conversation::where('number', '=', '+'.$request->telephone)->delete();
	}

}
