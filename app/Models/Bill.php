<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model {

	protected $table = 'bills';

	public function payment(){
		return $this->belongsTo('Payment');
	}
}
