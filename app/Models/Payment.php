<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class Payment extends Model implements BillableContract{

    use Billable;

	protected $table = 'payments';

	public function getStatus(){
		switch ($this->status) {
			case 'unpayed':
				echo "<span class=\"text-danger\">Non payé</span>";
			break;

			case 'payed':
				echo '<span class="text-success">Payé le '.date('d/m/Y', strtotime($this->updated_at)).'</span>';
			break;

			case 'canceled':
				echo 'Annulé';
			break;
			
			default:
				echo 'Erreur';
			break;
		}
	}

	public function getMission(){
		$mission = Mission::where('payment_id', $this->id)->first();
		return $mission;
	}

}
