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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Routes accessible to login users
Route::middleware([ 'auth' ])->group(function() {
    Route::get('/profiles', 'ProfileController@index');
    Route::get('/points', 'PointController@index');
    Route::get('s3-image-upload','S3ImageController@imageUpload');
    Route::post('s3-image-upload','S3ImageController@imageUploadPost');

    Route::post('/donate', 'PointController@donate')
        ->name('donate');
});

// Routes accessible to administrator
Route::middleware([ 'is_admin' ])->group(function() {
    Route::get('/admin', 'AdminController@admin')
        ->name('admin');

    Route::get('/admin/payment', 'AdminController@payment')
        ->name('payment');

    Route::post('/admin/deposit', 'AdminController@deposit')
        ->name('deposit');

    Route::post('/admin/withdraw', 'AdminController@withdraw')
        ->name('withdraw');
});

