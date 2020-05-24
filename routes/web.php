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

    Route::group(['middleware' => 'isadmin'], function(){

        Route::group(['prefix' => 'roles'], function(){
            Route::get('/', ['as' => 'roles.list', 'uses' => 'RoleController@index']);
            Route::post('save', ['as' => 'roles.save', 'uses' => 'RoleController@save']);
            Route::post('update', ['as' => 'roles.update', 'uses' => 'RoleController@update']);
            Route::post('delete', ['as' => 'roles.delete', 'uses' => 'RoleController@delete']);
        });

        Route::group(['prefix' => 'users'], function(){
            Route::get('/', ['as' => 'users.list', 'uses' => 'UserController@index']);
            Route::post('save', ['as' => 'users.save', 'uses' => 'UserController@save']);
            Route::post('update', ['as' => 'users.update', 'uses' => 'UserController@update']);
            Route::post('delete', ['as' => 'users.delete', 'uses' => 'UserController@delete']);
        });

    });

});
