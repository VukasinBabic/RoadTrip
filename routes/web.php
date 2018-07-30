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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
       
    Route::get('/roadtrip/create','RoadTripsController@create')->name('roadtrip.create');
    
    Route::post('/roadtrip/store','RoadTripsController@store')->name('roadtrip.store');
     
});

Route::get('/roadtrips','RoadTripsController@index')->name('roadtrips');
    
Route::get('/roadtrip/{id}','RoadTripsController@show')->name('roadtrip.map');

Route::get('/home', 'HomeController@index')->name('home');


