<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@home') -> name('home');

Route::post('/register', 'Auth\RegisterController@register') ->name('register');
Route::post('/login', 'Auth\LoginController@login') ->name('login');
Route::get('/logout', 'Auth\LoginController@logout') ->name('logout');

Route::get('api/list/videogame', 'ApiController@getGames') -> name('api.list.videogame');
Route::get('api/list/videogame/delete/{id}', 'ApiController@deleteVideogame') -> name('api.list.videogame.delete');


