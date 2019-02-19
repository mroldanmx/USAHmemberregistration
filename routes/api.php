<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// AJAX as API for now
Route::middleware(['auth'])->group(function () {

    // members
    //Route::resource('members', 'MembersController', ['as' => 'api']);
    Route::get('members', 'MembersController@index')->name('api.members.test');
    Route::post('members', 'MembersController@index')->name('api.members.index');
    Route::put('members/{id}', 'MembersController@update')->name('api.members.update');

});