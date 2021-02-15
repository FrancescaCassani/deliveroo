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

//ROTTE PER LOGIN / REGISTRAZIONE
Auth::routes();

<<<<<<< Updated upstream
//ROTTE PAGINE PER UTENTI LOGGATI
//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')
    ->namespace('admin/')
    ->name('admin.')
    ->middleware('auth')
    ->group(function() {
        //Home admin
        Route::get('/', 'HomeController@index')
        ->name('home');
        //ROTTE POST CRUD
    });
    
=======
//Tutto ciò che mettiamo qua dentro sarà protetto da auth
Route::prefix('admin')
     ->namespace('Admin')
     ->name('admin.')  //la parte che voglio mettere sempre prima della rotta che passo più sotto
     ->middleware('auth')
     ->group(function(){
        //Home Admin
        Route::get('/', 'HomeController@index')->name('home');

        //Rotte CRUD Post
        Route::resource('restaurants', 'PostController');
     });
>>>>>>> Stashed changes
