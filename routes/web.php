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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/change_profile', 'HomeController@change_profile')->name('change_profile');
Route::get('/books', 'BookController@index')->name('books');
Route::get('/mybooks', 'BookController@mybooks')->name('mybooks');
Route::get('/mybookings', 'BookingController@index')->name('mybookings');
Route::get('/addbook', 'BookController@addbook')->name('addbook');
Route::post('/addbook', 'BookController@registerbook')->name('registerbook');
Route::get('/editbook/{id}', 'BookController@editbook')->name('editbook');
Route::get('/removebook/{id}', 'BookController@removebook')->name('removebook');
Route::post('/updatebook', 'BookController@updatebook')->name('updatebook');
Route::get('/cancelbooking/{id}', 'BookingController@removebooking')->name('cancelbooking');
Route::get('/booking/{id}', 'BookingController@addbooking')->name('booking');
Route::get('/history/{id}', 'BookingController@history')->name('history');