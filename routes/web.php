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
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::middleware(['auth'])->group(function () {
  Route::get('/home', 'WebController@index')->name('home');
  Route::get('/', 'WebController@index');
  Route::post('/invite', 'WebController@invite')->name('invite');
  Route::get('/code/{id}', 'WebController@code')->name('code');
});
Route::get('/taggea/{id}', 'WebController@taggea')->name('taggea');
Route::get('/politicas', 'WebController@politicas')->name('politicas');
