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

Route::get('user/profil', 'UserController@profil')
    ->name('user.profil');
Route::resource('user', 'UserController')
    ->middleware('admin');

Route::get('loan/rendre{id}', 'LoanController@rendre')
    ->name('loan.rendre')
    ->middleware('admin');
Route::resource('loan', 'LoanController');

Route::get('product/card{id}', 'ProductController@card')
    ->name('product.card');
Route::post('product/search', 'ProductController@search')
    ->name('product.search');
Route::resource('product', 'ProductController');

Route::resource('category', 'CategoryController')
    ->middleware('admin');
Route::resource('statistic', 'StatisticController')
    ->middleware('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

