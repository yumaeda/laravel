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

Route::get('/profiles', 'ProfileController@index');
Route::get('/points', 'PointController@index');

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::get('/admin/payment', 'AdminController@payment')
    ->middleware('is_admin')
    ->name('payment');

Route::post('/admin/deposit', 'AdminController@deposit')
    ->middleware('is_admin')
    ->name('deposit');

