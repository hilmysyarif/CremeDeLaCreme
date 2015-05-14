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
			@if( Session::has('description') )
			
			<p>Le paiement pour <i><strong>{{ Session::get('description') }}</strong></i> ({{ Session::get('amount')}}€) a bien été effectué<br>
			PS : Tous nos formulaires de paiement sont sécurisés et vos informations bancaires ne sont pas conservées.<br><br>
			Crème de la Crème vous remercie pour votre achat. Une facture vous sera très prochainement envoyée par mail.</p>
			
			@else

			<p><h3>Accès non autorisé !</h3><br>
			PS : Tous nos formulaires de paiement sont sécurisés et vos informations bancaires ne sont pas conservées.<br><br></p>

			@endif
			
		</div>
	</div>
	</br></br>
</body>
</html>

