<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $table = 'messages';

	static function getMessagesWithPhone($phone){
		$messages = Message::where('telephone', $phone)->orderBy('id', 'ASC')->get();
		return $messages;
	}

}
