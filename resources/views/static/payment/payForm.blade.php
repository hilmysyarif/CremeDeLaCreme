<html>
<head>
	<title>Paiement Crème de la Crème</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,900,900italic,700italic,700,500italic,500,300italic,400italic,300,100italic,100" rel="stylesheet" type="text/css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<meta charset="UTF-8">
	<style>
	body{
		font-family: "Roboto", sans-serif; margin: 10px 10px;
	}
	p{
		font-size:16px;
	}
	h1{
		font-family: "Roboto" ; margin-top:30px; font-size:45pt; font-weight: 900; font-style: italic;
	}
	.text-center{
		text-align:center !important;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row text-center">
			<h1>Crème de la Crème</h1>
			<br>
			<p>Merci de bien vouloir cliquer sur le bouton ci-dessous pour effectuer le paiement.<br>
			PS : Ce formulaire est sécurisé et vos informations bancaires ne sont pas conservées.<br><br></p>
			<form action="#" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<input type="hidden" name="price" value="{{$payment->price}}">
			<input type="hidden" name="description" value="{{$payment->description}}">
			  <script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-label="Payer par carte bancaire"
			    data-key="pk_live_lxTz6jcolVihHHZqwmsFCgnD"
			    data-amount="{{$payment->price}}"
			    data-currency="eur"
			    data-name="Crème de la Crème"
			    data-description="{{$payment->description}}">
			  </script>
			</form>
		</div>
	</div>
	</br></br>
</body>
</html>

