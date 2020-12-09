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

Auth::routes();

Route::resource('birthday', 'BirthdayController')->middleware('auth');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('conf', 'ConfController')->middleware('auth');
Route::resource('helpdesk', 'HelpdeskController')->middleware('auth');
Route::resource('home', 'HomeController')->middleware('auth');
Route::resource('panel', 'panelController')->middleware('auth');
Route::resource('performance', 'PerformanceController')->middleware('auth');
Route::resource('registers', 'RegistersController')->middleware('auth');
Route::resource('restaurant', 'RestaurantController')->middleware('auth');

Route::get('concierge', 'ConciergeController@index')->name('concierge.index')->middleware('auth');
Route::group(['prefix' => 'concierge', 'as' => 'concierge.', 'middleware' => 'auth'], function () {
    Route::get('dash', 'ConciergeController@dash')->name('dash');
    Route::get('collaborators', 'ConciergeController@collaborators')->name('collaborators');
    Route::get('visitors', 'ConciergeController@visitors')->name('visitors');
    Route::get('vehicles', 'ConciergeController@vehicles')->name('vehicles');
    Route::get('reports', 'ConciergeController@reports')->name('reports');
});

Route::get('/', function () {
    return redirect()->route('home.index');
});
