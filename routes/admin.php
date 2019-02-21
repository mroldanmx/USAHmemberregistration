<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

	// dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // members
    Route::resource('members', 'MembersController', ['as' => 'admin']);

    // registrations
    Route::resource('registrations', 'RegistrationController', ['as' => 'admin']);

    // subscriptions
    Route::get('subscriptions', 'SubscriptionsController@index')->name('admin.subscriptions.index');
    Route::get('subscriptions/{id}', 'SubscriptionsController@show')->name('admin.subscriptions.view');

    // pricing
    Route::get('pricing', 'PricingController@index')->name('admin.pricing.index');

    // coupons
    Route::resource('coupons', 'CouponsController', ['as' => 'admin']);

    // reports
    Route::get('reports', 'ReportsController@index')->name('admin.reports.index');

    // account routes
    //Route::get('account/summary', 'AccountController@summary')->name('account.summary');
});
