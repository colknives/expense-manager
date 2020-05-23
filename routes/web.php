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


Route::redirect('/', '/login');

Route::get('/login', ['as' => 'auth.login.show', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);
Route::post('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

});
