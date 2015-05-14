<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Bill;
use Bitly;

class PaymentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$payments = Payment::all();
		return view('admin.payments.index')->with(compact("payments"));
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$payment = new Payment;
		$payment->client_name = $request->client_name;
		$payment->client_email = $request->client_email;
		$payment->description = $request->description;
		$payment->price = $request->price;
		if($request->client_address){
			$payment->client_address = $request->client_address;
		}

		// BitLy URL

		$payment->save();

		$payment->shortLink = Bitly::shorten( url('http://cremedelacreme.io/payments/'.$payment->id) ) ['data']['url'];
		$payment->save();


		return redirect()->back()->with('success', 'Demande de paiement créée avec succès'); 

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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

	public function getPayPage($id){
		$payment = Payment::find($id);
		if(!isset($payment)){
			return redirect('payment/error');
		}
		elseif( $payment->status == 'payed' || $payment->status == 'canceled'){
			return redirect('payment/payed');
		}
		else
		{
			return view('static.payment.payForm')->with(compact("payment"));		
		}
	}

	public function postPayPage($id, Request $request){
		$payment = Payment::find($id);
		if(!isset($payment) OR $payment->status == 'payed' || $payment->status == 'canceled'){
			return redirect('payment/error');
		}

		if($request->price != $payment->price){
			return redirect('/payments/'.$payment->id)->with('error', 'Merci de re-essayer. Vous n\'avez pas été débité suite à un problème technique.<br>Si le problème persiste, merci de nous tenir informé !');
		}

		$charge = $payment->charge($payment->price, [
			'amount' => $request->price,
			'currency' => 'eur',
		    'source' => $request->stripeToken,
		    'description' => $request->description,
		]);

		if($charge->paid){
			$payment->stripe_transaction_id = $charge->id;
			$payment->status = 'payed';
			$payment->client_email = $charge->source->name;
			$payment->save();

			$bill = new Bill;
			$bill->payment_id = $payment->id;
			$bill->card_id = $charge->source->id;
			$bill->last_four = $charge->source->last4;
			$bill->save();

			return redirect('/payment/validate')->with(array(
				'description'	=>	$request->description,
				'amount'		=>	$request->price,
			));
		}
		else
		{
			return redirect('/payments/'.$payment->id)->with('error', 'Merci de re-essayer. Vous n\'avez pas été débité suite à un problème technique.<br>Si le problème persiste, merci de nous tenir informé !');
		}


	}


}
