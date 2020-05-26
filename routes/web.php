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
    return view('welcome');
});

Auth::routes();

//Grupo de Rutas con el Middleware Auth ( para forzar el inicio d Sesion)
Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('admin/user', 'Admin\UserController');
	Route::get('users/export/', 'Admin\UserController@export');
});
