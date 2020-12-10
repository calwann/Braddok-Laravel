<?php

use Illuminate\Support\Facades\Route;


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

// Authentication routes
Auth::routes();


// Routes
Route::resource('home', 'HomeController')->middleware('auth');

Route::resource('panel', 'panelController')->middleware('auth');

Route::resource('conf', 'ConfController')->middleware('auth');

Route::get('concierge', 'ConciergeController@index')->name('concierge.index')->middleware('auth');
Route::group(['prefix' => 'concierge', 'as' => 'concierge.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'ConciergeController@dash')->name('dash');
    Route::get('collaborators', 'ConciergeController@collaborators')->name('collaborators');
    Route::get('visitors', 'ConciergeController@visitors')->name('visitors');
    Route::get('vehicles', 'ConciergeController@vehicles')->name('vehicles');
    Route::get('reports', 'ConciergeController@reports')->name('reports');
});

Route::get('restaurant', 'RestaurantController@index')->name('restaurant.index')->middleware('auth');
Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'RestaurantController@dash')->name('dash');
    Route::get('register', 'RestaurantController@register')->name('register');
    Route::get('reports', 'RestaurantController@reports')->name('reports');
});

Route::get('performance', 'PerformanceController@index')->name('performance.index')->middleware('auth');
Route::group(['prefix' => 'performance', 'as' => 'performance.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'PerformanceController@dash')->name('dash');
    Route::get('register', 'PerformanceController@register')->name('register');
    Route::get('reports', 'PerformanceController@reports')->name('reports');
});

Route::get('registers', 'RegistersController@index')->name('registers.index')->middleware('auth');
Route::group(['prefix' => 'registers', 'as' => 'registers.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'RegistersController@dash')->name('dash');
    Route::get('reports', 'RegistersController@reports')->name('reports');
});

Route::get('helpdesk', 'HelpdeskController@index')->name('helpdesk.index')->middleware('auth');
Route::group(['prefix' => 'helpdesk', 'as' => 'helpdesk.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'HelpdeskController@dash')->name('dash');
    Route::get('request', 'HelpdeskController@register')->name('request');
    Route::get('support', 'HelpdeskController@reports')->name('support');
});

Route::resource('birthday', 'BirthdayController')->middleware('auth');


// Redirect
Route::get('/', function () {
    return redirect()->route('home.index');
});
