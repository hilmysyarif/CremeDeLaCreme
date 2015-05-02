@extends('static.main')

@section('content')
<section>
	<div class="container">
		<h2>Rejoignez-nous</h2>
		<div class="typeform-widget" data-url="https://ideasinparis.typeform.com/to/jVeXJQ" data-text="Rejoindre la Crème de la Crème" style="width:100%;height:500px;"></div>
		<script>(function(){var qs,js,q,s,d=document,gi=d.getElementById,ce=d.createElement,gt=d.getElementsByTagName,id='typef_orm',b='https://s3-eu-west-1.amazonaws.com/share.typeform.com/';if(!gi.call(d,id)){js=ce.call(d,'script');js.id=id;js.src=b+'widget.js';q=gt.call(d,'script')[0];q.parentNode.insertBefore(js,q)}})()
		</script><br>
		<a href="{{ url('/') }}" class="back-to-creme">Retour sur la page principale</a>
	
		</div>
</section>
@stop