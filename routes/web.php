<?php

// use App\Http\Controllers\Admin\DashboardController;

use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
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

Auth::routes(['verify' => true]);

Route::get('test', function(){
    $data = Transaction::with(['details', 'travel_package.galleries', 'user'])
    ->findOrFail(21);
    // return $data->details;
    return view('email.transaction-success', [
        'data' => $data
    ]);
    // return Hash::make('12345678');
});

Route::get('/', 'App\Http\Controllers\HomeController@index')
->name('home');

Route::get('/detail/{slug}', 'App\Http\Controllers\DetailController@index')
->name('detail');

Route::post('/checkout/{id}', 'App\Http\Controllers\CheckoutController@process')
->name('checkout_process')
->middleware(['auth','verified']);

Route::get('/checkout/{id}', 'App\Http\Controllers\CheckoutController@index')
->name('checkout')
->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'App\Http\Controllers\CheckoutController@create')
->name('checkout-create')
->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', 'App\Http\Controllers\CheckoutController@remove')
->name('checkout-remove')
->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'App\Http\Controllers\CheckoutController@success')
->name('checkout-success')
->middleware(['auth', 'verified']);

Route::get('/check-detail/{id}', 'App\Http\Controllers\CheckoutController@detail')
->name('checkdetail')
->middleware(['auth', 'verified']);


Route::prefix('admin')
->namespace('App\Http\Controllers\Admin')
->middleware(['auth','admin'])
->group(function(){
    Route::get('/', 'DashboardController@index')
    ->name('dashboard');

    Route::resource('travel-package','TravelPackageController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('transaction', 'TransactionController');
    });

    //midtrans
    Route::post('/midtrans/callback', 'App\Http\Controllers\MidtransController@notificationHandler');
    Route::get('/midtrans/finish', 'App\Http\Controllers\MidtransController@finishRedirect');
    Route::get('/midtrans/unfinish', 'App\Http\Controllers\MidtransController@unfinishRedirect');
    Route::get('/midtrans/error', 'App\Http\Controllers\MidtransController@errorRedirect');
