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
				echo '<span class="text-success">Payé</span>';
			break;

			case 'canceled':
				echo 'Annulé';
			break;
			
			default:
				echo 'Erreur';
			break;
		}
	}

}
