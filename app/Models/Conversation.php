<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Payment;
use App\Models\Mission;

class Conversation extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $table = 'conversations';

	static function getActiveConversations(){
		$conversations = Conversation::where('active', 1)->orderBy('updated_at', 'DESC')->get();
		return $conversations;
	}

	static function getInactiveConversations(){
		$conversations = Conversation::where('active', 0)->orderBy('updated_at', 'DESC')->get();
		return $conversations;
	}

	public function setInactive(){
		$this->active = 0;
	}

	public function setActive(){
		$this->active = 1;
	}

	static function getConversation($telephone){
		$conversation = Conversation::where('number', '+'.$telephone)->first();
		return $conversation;
	}

}
