<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

// ^ proteggo tutte le rotte con il middleware: devo essere autenticato altrimenti non accedo al link ma mi viene restituita la pagina di login
Route::middleware(('auth'))
    //  aggiorna la cartella all'interno della quale si trovano i controller
    ->namespace('Admin')
    //  aggiorna il name di ogni "subroute" con prefisso admin.
    ->name('admin.')
    // aggiorna ogni url con un prefisso admin/
    ->prefix('admin')
    //raggruppa varie rotte
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Route::get('/profile', 'HomeController@getProfile')->name('profile');
        Route::resource('/posts', 'PostController');

        // ^ posta custom clearCategory
        Route::patch('/posts/{id}/clear-category', 'PostController@clearCategory')->name('posts.clearCategory');

        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');

    });

// Route::middleware('auth')->get('/home', 'Admin\HomeController@index')->name('home');

//inseriamola come ultima rotta alla fine del file web.php
Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*");
