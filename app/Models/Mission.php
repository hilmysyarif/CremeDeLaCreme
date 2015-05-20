<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

	protected $table = 'missions';

	public function user(){
		return $this->belongsTo('App\Models\User');
	}

	public function payment(){
		return $this->belongsTo('App\Models\Payment');
	}


	public function getStatus(){
		$list = [
			'0'	=>	'En attente de paiement',
			'1'	=>	'Payée 50%',
			'2' =>	'Attente d\'infos',
			'3'	=>	'Recherche students',
			'4'	=>	'Student working',
			'5'	=>	'Attente d\'une J-E',
			'6'	=>	'J-E working',
			'8'	=>	'A nous d\'agir',
			'7'	=>	'En attente 50% restants',
			'9'	=>	'Annulé',
			'10'=>	'Terminée'
		];

		return $list[$this->status];
	}

	static function getStatusFromId($id){
		$list = [
			'0'	=>	'En attente de paiement',
			'1'	=>	'Payée 50%',
			'2' =>	'Attente d\'infos',
			'3'	=>	'Recherche students',
			'4'	=>	'Student working',
			'5'	=>	'Attente d\'une J-E',
			'6'	=>	'J-E working',
			'8'	=>	'A nous d\'agir',
			'7'	=>	'En attente 50% restants',
			'9'	=>	'Annulé',
			'10'=>	'Terminée'
		];

		return $list[$id];
	}

	static function getAllStatus(){
		$list = [
			'0'	=>	'En attente de paiement',
			'1'	=>	'Payée 50%',
			'2' =>	'Attente d\'infos',
			'3'	=>	'Recherche students',
			'4'	=>	'Student working',
			'5'	=>	'Attente d\'une J-E',
			'6'	=>	'J-E working',
			'8'	=>	'A nous d\'agir',
			'7'	=>	'En attente 50% restants',
			'9'	=>	'Annulé',
			'10'=>	'Terminée'
		];
		return $list;	
	}

	public function isFinished(){
		if($this->getStatus() == 'Terminée'){
			return true;
		}
		else{
			return false;
		}
	}
}
