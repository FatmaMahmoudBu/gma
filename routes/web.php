<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test', 'Website\HomeController@index')->name('test');

Auth::routes();
//Auth::routes(['register' => false]);
Route::post('store-token', 'NotificationSendController@updateDeviceToken')->name('store.token');

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('services/evaluation','ServicesController@evaluation')->name('evaluation');

Route::group(['middleware' => ['auth']], function() {    
Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::get('users/edit_profile/{id}','UserController@edit_profile')->name('edit_profile');
Route::post('users/update_profile/{id}','UserController@update_profile')->name('update_profile');
Route::resource('services','ServicesController');
Route::get('/report1', 'ReportController@index')->name('report1');
Route::post('/report1/show', 'ReportController@show')->name('report1_show');
Route::get('/services/workers/{id}', 'ServicesController@workers')->name('workers');
Route::post('/services/workers_evaluation', 'ServicesController@workers_evaluation')->name('workers_evaluation');
});

//Route for mailing
Route::get('/email', function(){
    Mail::to('fatma.mahmoud@bu.edu.eg')->send(new WelcomeMail());
    return new WelcomeMail();
});
Route::get('/{page}', 'AdminController@index');

// Microsoft login
Route::get('login/microsoft', [App\Http\Controllers\Auth\LoginController::class, 'redirectToMicrosoft'])->name('login.microsoft');
Route::get('login/microsoft/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleMicrosoftCallback']);

//Google Login
Route::get('login/google', '[App\Http\Controllers\Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

//Facebook Login
Route::get('login/facebook', '[Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

//Github Login
Route::get('login/github', '[App\Http\Controllers\Auth\LoginController@redirectToGithub')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');

