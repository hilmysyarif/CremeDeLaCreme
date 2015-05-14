<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/* Static Pages */
Route::get('/', 'HomeController@indexStaticPage');
Route::get('contact', 'HomeController@contactStaticPage');
Route::get('jobs', 'HomeController@jobsStaticPage');
Route::get('conditions-generales', 'HomeController@conditionStaticPage');
Route::get('mentions-legales', 'HomeController@legalStaticPage');
Route::get('espace-presse', 'HomeController@presseStaticPage');
Route::get('payment/payed', 'HomeController@paymentPayedPage');
Route::get('payment/validate', 'HomeController@paymentValidatePage');
Route::get('payment/error', 'HomeController@paymentErrorPage');
Route::get('payments/{id}', 'PaymentController@getPayPage');
Route::post('payments/{id}', 'PaymentController@postPayPage');
/* Admin Pages */


Route::group(['prefix' => 'admin'], function(){

	Route::get('login', 'RegisterController@getLogin');
	Route::post('login', 'RegisterController@login');
	Route::get('logout', 'RegisterController@logout');
	Route::resource('auth', 'RegisterController');

	Route::group(['middleware' => 'auth'], function()
	{
		Route::get('dashboard', 'AdminController@showDashboard');
	});

	Route::group(['middleware' => 'admin'], function()
	{
		Route::resource('users', 'UserController');
		Route::resource('statistics', 'StatisticController');
		Route::resource('payments', 'PaymentController');

	});


	Route::resource('messages', 'MessagesController');
	Route::get('my-stats', 'StatisticController@showMyStats');
	Route::resource('students', 'StudentController');

});