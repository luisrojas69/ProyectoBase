<?php

use App\Notifications\SystemNotifications;
use App\User;
use Illuminate\Support\Facades\App;
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
	User::find(1)->notify(new SystemNotifications);
    return view('welcome');
});

Route::get('/sendmail', function () {
	$message = [ 'title' => "Este es el Titulo", 'body' => "Este es el Contenido" ];
	User::find(1)->notify(new SystemNotifications($message));

	//Enviar a multiples
   // $users = User::all();
   // Notification::send($users, new SystemNotifications($message));
    return redirect()->route('home')->with('success', 'Notification was Sended');
});

Auth::routes();

//Grupo de Rutas con el Middleware Auth ( para forzar el inicio d Sesion)
Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('admin/user', 'Admin\UserController');
	Route::get('users/export/', 'Admin\UserController@export');
});
