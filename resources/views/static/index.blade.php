@extends('static.main')

@section('content')
<section>
	<div class="container">
		<img src="{{ asset('img/logos-ecoles.png') }}" alt="Différentes écoles proposées par de Crème de la Crème">
		<h2>Quand les étudiants des grandes écoles révolutionnent le service à la demande</h2>	
		<div class="number">07 56 990 146</div>
		<i>Envoyez simplement "<span class="blue">CREME</span>" à ce numéro pour être mis en relation.</i>
		<h3 class="question">Comment est-ce que cela fonctionne ?</h3>
		<p class="paragraph">
			Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.<br>
			Faites-nous part de votre besoin par SMS et nous traiterons votre demande en un temps record.  
        </p>
	</div>
</section>
<section>
	<div class="container">
        <h3 class="question">Soutien scolaire et services professionnels</h3>
        <img src="{{ asset('img/Creme1.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme2.png') }}" class="creme" alt="">
        <h3 class="question">Recrutement et emploi à la demande</h3>
        <img src="{{ asset('img/Creme3.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme4.png') }}" class="creme" alt="">
        <h3 class="question">Publicité et marketing</h3>
        <img src="{{ asset('img/Creme5.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme6.png') }}" class="creme" alt="">
        <h3 class="question">Etudes de proximité</h3>
        <img src="{{ asset('img/Creme10.png') }}" class="creme" alt="">
        <img src="{{ asset('img/Creme9.png') }}" class="creme" alt="">
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
		<h2>Témoignages</h2>
		<blockquote>
			<p>C'est un véritable court-circuit de l’économie traditionnelle.</p>
			<span class="author">– Yann L.</span>
		</blockquote>
		<blockquote>
			<p>Cette nouvelle utilisation du smartphone pour fournir du travail et des services va révolutionner de nombreux fondements du capitalisme du XXème siècle.</p>
			<span class="author">– The Economist</span>
		</blockquote>
	</div>
</section>
@stop