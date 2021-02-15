<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

//HOME
Route::get('/', 'HomeController@index')->name('home');

//RESTAURANT ADMIN
// Route::get('/admin/restaurants', 'RestaurantController')->name('admin.restaurants.index');

//ROTTE PER LOGIN / REGISTRAZIONE
Auth::routes();

//ROTTE PAGINE PER UTENTI LOGGATI
//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {
        //Home admin
        Route::get('/', 'HomeController@index')->name('home');

        //ROTTE Restaurants CRUD
        Route::resource('restaurants', 'RestaurantController');
    });

