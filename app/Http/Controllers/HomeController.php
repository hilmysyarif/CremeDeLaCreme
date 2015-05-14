<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	
	public function indexStaticPage()
	{
		$page = [
   			'title'			=>	'Crème de la Crème',
			'description' 	=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
			'seo_title'		=>	'Crème de la Crème révolutionne le service à la demande, grâce au SMS.',
			'seo_description'=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
            'seo_type'	=>	'website',
            'keywords'	=>	'grandes écoles, creme de la creme, universites françaises, mise en relation, service à la demande',
        ];

		return view('static.index')->with(compact("page"));
	}

	public function contactStaticPage()
	{
		return 'contact';
	}

	public function jobsStaticPage()
	{
		$page = [
   			'title'			=>	'Recrutements & Jobs - Crème de la Crème',
			'description' 	=>	'Vous souhaitez intégrer une équipe d\'étudiants qualifiés faisant partie des plus grandes écoles et universités françaises pour répondre à des demandes de services ?',
			'seo_title'		=>	'Recrutements & Jobs - Crème de la Crème révolutionne le service à la demande, grâce au SMS.',
			'seo_description'=>	'Vous souhaitez intégrer une équipe d\'étudiants qualifiés faisant partie des plus grandes écoles et universités françaises pour répondre à des demandes de services ?',
            'seo_type'	=>	'website',
            'keywords'	=>	'grandes écoles, creme de la creme, universites françaises, mise en relation, service à la demande',
        ];

		return view('static.jobs')->with(compact("page"));
	}

	public function conditionStaticPage()
	{
		$page = [
   			'title'			=>	'Mentions Légales - Crème de la Crème',
			'description' 	=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
			'seo_title'		=>	'Crème de la Crème révolutionne le service à la demande, grâce au SMS.',
			'seo_description'=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
            'seo_type'	=>	'website',
            'keywords'	=>	'grandes écoles, creme de la creme, universites françaises, mise en relation, service à la demande',
        ];

		return view('static.conditions')->with(compact("page"));
	}

	public function legalStaticPage()
	{
		$page = [
   			'title'			=>	'Mentions Légales - Crème de la Crème',
			'description' 	=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
			'seo_title'		=>	'Crème de la Crème révolutionne le service à la demande, grâce au SMS.',
			'seo_description'=>	'Des étudiants qualifiés faisant partie des plus grandes écoles et universités françaises sont à votre disposition 24h/24 pour répondre à toutes vos demandes de services.',
            'seo_type'	=>	'website',
            'keywords'	=>	'grandes écoles, creme de la creme, universites françaises, mise en relation, service à la demande',
        ];

		return view('static.mentions-legales')->with(compact("page"));
	}

	public function presseStaticPage()
	{
		return 'presse';
	}


	public function paymentPayedPage(){
		return view('static.payment.payed');
	}

	public function paymentValidatePage(){
		return view('static.payment.validate');
	}

	public function paymentErrorPage(){
		return view('static.payment.error');
	}

}
