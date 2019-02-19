<?php

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
    return view('landing');
});

Auth::routes();

Route::get('/registration', 'RegistrationWebController@index');

Route::middleware(['register'])->group(function () {
    Route::get('register/{step}', 'RegistrationWebController@loadStep');
});
Route::post('register/age', 'RegistrationWebController@ageStep');
Route::post('register/member_type', 'RegistrationWebController@memberTypeStep');
Route::post('register/who', 'RegistrationWebController@whoStep');
Route::post('register/referee', 'RegistrationWebController@refereeTypeStep');
Route::post('register/personal', 'RegistrationWebController@personalInformationStep');
Route::post('register/address', 'RegistrationWebController@addressStep');
Route::post('register/contact', 'RegistrationWebController@contactStep');
Route::post('register/diversity', 'RegistrationWebController@diversityStep');
Route::post('register/donation', 'RegistrationWebController@donationStep');
Route::post('register/waiver', 'RegistrationWebController@waiverStep');
Route::post('register/concussion', 'RegistrationWebController@concussionStep');
Route::post('register/verify', 'RegistrationWebController@verifyStep');
Route::post('register/payment', 'RegistrationWebController@paymentStep');



