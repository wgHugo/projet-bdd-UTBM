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

// Route pour USER
Route::get('user/profil', 'UserController@profil')
    ->name('user.profil');
Route::resource('user', 'UserController');
Route::get('user', 'UserController@index')
    ->name('user.index')->middleware('admin');
Route::get('user/create', 'UserController@create')
    ->name('user.create')->middleware('admin');;
Route::get('loan/rendre{id}', 'LoanController@rendre')
    ->name('loan.rendre')
    ->middleware('admin');
Route::resource('loan', 'LoanController');

// Route pour PRODUCT
Route::get('product/card{id}', 'ProductController@card')
    ->name('product.card');
Route::resource('product', 'ProductController');

// Route pour CATEGORY
Route::get('category/create', 'CategoryController@create')
    ->name('category.create');
Route::get('category/{id}', 'CategoryController@card')
    ->name('category.card');
Route::resource('category', 'CategoryController')
    ->middleware('admin');

Route::get('statistic/generatePDFUsers', 'StatisticController@generatePDFUsers')
    ->name('statistic.generatePDFUsers')
    ->middleware('admin');
Route::get('statistic/generatePDFProducts', 'StatisticController@generatePDFProducts')
    ->name('statistic.generatePDFProducts')
    ->middleware('admin');
Route::get('statistic/generatePDFInOut', 'StatisticController@generatePDFInOut')
    ->name('statistic.generatePDFInOut')
    ->middleware('admin');
Route::resource('statistic', 'StatisticController')
    ->middleware('admin');

Route::get('reservations/convert{id}', 'ReservationsController@convert')
    ->name('reservation.convert')
    ->middleware('admin');
Route::resource('reservations', 'ReservationsController');

Route::post('search', 'SearchController@search')
    ->name('search');

Route::get('comments', 'CommentController@index')
    ->name('comments');
Route::get('comment/show{id}', 'CommentController@show')
    ->name('comment.show');
Route::post('comment/store', 'CommentController@store')
    ->name('comment.add');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

