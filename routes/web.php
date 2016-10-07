<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/logout', function () {
    auth()->logout();

    return back();
});

Route::resource('households', 'HouseholdsController');
Route::resource('households.receipts', 'ReceiptsController');
Route::resource('households.cart', 'CartController');

Route::get('households/{household}/toggle', 'HouseholdsController@toggle')->name('households.toggle');

Route::get('households/{household}/repay/{user}', 'RepaymentsController@index')->name('repayements.index');
Route::post('households/{household}/repay/{user}', 'RepaymentsController@store')->name('repayements.store');

Route::get('/cart/{household}', 'CartController@list');

Route::get('/get', function () {
	return App\Models\Household::all();
});
