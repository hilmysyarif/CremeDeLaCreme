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
		Route::resource('missions', 'MissionController');

	});


	Route::resource('messages', 'MessagesController');
	Route::get('my-stats', 'StatisticController@showMyStats');
	Route::resource('students', 'StudentController');


	// Routes API
	Route::group(['prefix'=>'api'],function(){
		// Messages API
		Route::group(['prefix'=>'messages'], function(){
			Route::get('/', 'ApiController@getActiveConversations');
			Route::get('/get/{phone}', 'ApiController@getMessagesOnAConversation');
			Route::post('/store', 'MessagesController@store');
			Route::get('/setStatus', 'ApiController@setMessageStatus');
			Route::get('/getStatus/{phone}', 'ApiController@getStatusMessage');
			Route::post('/get', 'ApiController@getMessage');
			Route::get('/setRead', 'ApiController@setMessageRead');
			Route::get('/delete', 'ApiController@softDeleteMessage');
			Route::get('/deleteConversation', 'ApiController@softDeleteConversation');
		});

		// Missions API
		Route::group(['prefix'=>'missions'], function(){
			Route::get('{id}', 'MissionController@show');
		});

	});
});

/* API Mobile */
Route::group(['prefix'=>'api/mobile/v1'], function(){
	// Missions API
	Route::group(['prefix'=>'missions'], function(){
		Route::get('/', 'MobileApiController@indexMission');
	});
});