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
    return view('welcome');
});

Route::get('/sendmail', function () {
	//User::find(1)->notify(new SystemNotifications);
	$message = [ 
		'title' => "Este es el Titulo", 
		'body' => "<h3>Lorem ipsum represents</h3>
                     <hr>
                    <i>a long-held tradition for designers,</i>
                    typographers and the like.<br><br><br> <b>Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.</b>", 
		'sender' => "Pedro Perez"];
	User::findOrFail(8)->notify(new SystemNotifications($message));

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
	Route::get('compose', 'MessagesController@compose')->name('send');
	Route::post('message', 'MessagesController@store')->name('message.store');
	Route::get('messages', 'MessagesController@index')->name('message.index');
});

//Rutas API
Route::get('vue/items', function(){
	return view('pages.admin.items.items');
});

Route::resource('items', 'ItemsController')->except(['show', 'create']);
