@extends('static.main')

@section('content')
<section>
	<div class="container">
		<img src="{{ asset('img/logos-ecoles.png') }}" alt="Différentes écoles proposées par de Crème de la Crème">
		<h2>Quand les étudiants des grandes écoles révolutionnent le service à la demande</h2>	
		<div class="number">07 83 987 770</div>
		<i>Envoyez "<span class="blue">CREME</span>" à ce numéro gratuit pour être mis en relation.</i>
		<h3 class="question">Comment est-ce que cela fonctionne ?</h3>
		<p class="paragraph">
			Des étudiants faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à vos demandes de services professionnels.<br>
			Faites-nous part de votre besoin par SMS et nous traiterons votre demande dans les plus brefs délais.  
        </p>
	</div>
</section>
<section>
	<div class="container">
		<h2 class="question">Que puis-je demander ?</h2>
        <h3 class="question">Soutien scolaire et services professionnels</h3>
        <img src="{{ asset('img/Creme1.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme2.png') }}" class="creme" alt="">
        <h3 class="question">Etudes de proximité</h3>
        <img src="{{ asset('img/Creme10.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme9.png') }}" class="creme" alt="">
        <h3 class="question">Recrutement et emploi à la demande</h3>
        <img src="{{ asset('img/Creme3.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme4.png') }}" class="creme" alt="">
        <h3 class="question">Publicité et marketing</h3>
        <img src="{{ asset('img/Creme5.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme6.png') }}" class="creme" alt="">
        <h3 class="question">Services pour étudiants internationaux</h3>
        <img src="{{ asset('img/Creme8.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme7.png') }}" class="creme" alt="">
        <h3>Et bien plus encore...</h3>
	</div>
</section>
<section id="faq">
	<div class="container">
		<h2>FAQ</h2>
		<h3>- Qu'est-il possible de demander ?</h3>
		<p>Tout ce qui nécessite l'aide ou l'expertise des étudiants de notre réseau. Que vous soyez un particulier ou une entreprise, nous nous engageons à répondre à votre demande.</p>
		<h3>- Combien est-ce que cela coûte ?</h3>
		<p>Les conversations par SMS sont gratuites. Si vous choisissez de faire appel à nos services à la demande (soutien scolaire, consulting, etc), nous vous communiquerons alors nos tarifs.</p>
		<h3>- Comment se passe la transaction ?</h3>
		<p>Nous utilisons <a href="http://stripe.com" target="_blank">Stripe</a> pour assurer les transactions sur smartphones. Vos données bancaires ne sont pas conservées.</p>
	</div>
</section>
<section id="testimonials">
	<div class="container">
		<h2>Ils parlent de Crème de la Crème</h2>
		<a href="www.20minutes.fr/paris/1599047-20150430-paris-etudiants-grandes-ecoles-mettent-service" target="_blank"><img src="{{ asset('img/logo-20minutes.jpg') }}" alt=""></a>
		<a href="www.20minutes.fr/paris/1599047-20150430-paris-etudiants-grandes-ecoles-mettent-service" target="_blank"><img src="{{ asset('img/logo-clique.jpg') }}" alt=""></a>
	</div>
</section>
@stop