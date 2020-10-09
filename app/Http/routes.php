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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',
	array('as'=>'home','uses'=>'HomeController@Index'));

Route::get('auth/register', 
	array('as'=>'getRegister','uses'=>'Auth\AuthController@getRegister'));
Route::post('auth/register',
	array('as'=>'postRegister','uses'=>'Auth\AuthController@postRegister'));

Route::get('auth/login', 
	array('as'=>'getLogin','uses'=>'Auth\AuthController@getLogin'));
Route::post('auth/login',
	array('as'=>'postLogin','uses'=>'Auth\AuthController@postLogin'));

Route::get('auth/logout', 
	array('as'=>'getLogout','uses'=>'Auth\AuthController@getLogout'));

Route::resource('joblistings', 'JoblistingsController');
Route::resource('recruiters', 'RecruitersController');

Route::resource('joblistings.applications', 'ApplicationsController');
Route::resource('applications.interviews', 'InterviewsController');
Route::get('applications/all', array('as'=>'applications.all', 'uses'=>'ApplicationsController@allApplications'));
Route::get('applications/offers', array('as'=>'applications.offers', 'uses'=>'ApplicationsController@offers'));
Route::put('applications/{application}/shortlist', array('as' => 'shortlist_applicant', 'uses' => 'ApplicationsController@shortlist'));
Route::put('applications/{application}/reject', array('as' => 'reject_applicant', 'uses' => 'ApplicationsController@reject'));
Route::post('applications/{application}/interviews/create', array('as'=>'create_interview', 'uses' => 'InterviewsController@create'));
Route::post('applications/{application}/sendoffer', array('as' => 'send_offer', 'uses' => 'ApplicationsController@sendOffer'));
Route::put('applications/{application}/acceptoffer', array('as' => 'accept_offer', 'uses' => 'ApplicationsController@acceptOffer'));
Route::put('applications/{application}/declineoffer', array('as' => 'decline_offer', 'uses' => 'ApplicationsController@declineOffer'));
Route::get('applications/{application}/viewcv', array('as' => 'view_cv', 'uses' => 'ApplicationsController@viewCV'));
Route::get('applicationsuccess', array('as'=>'applicationSuccess','uses'=>'ApplicationsController@success')); // Route to Application Success Page

Route::get('interviews/all', array('as'=>'interviews.all', 'uses'=>'InterviewsController@allInterviews'));
Route::resource('users', 'UsersController');

Route::group(array('prefix'=>'admin','namespace'=>'admin', 'middleware'=>'admin'), function() 
{
	Route::resource('user','UserController'); 
});

Route::get('contact', array('as'=>'contactPage','uses'=>'HomeController@contact')); // Route to Contact Page