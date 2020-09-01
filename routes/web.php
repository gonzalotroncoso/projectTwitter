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

Route::get('/','GuestController@index')->name('guest.index');//muestro todas las entradas de todos los usuarios

Auth::routes();//maneja el login

Route::get('/home', 'HomeController@index')->name('home');//muestro los titulos de entradas del usuario logueado y cuando hace click redirijo a entries.show


Route::get('/entries/create', 'EntryController@create')->name('entries.create');//me muestra la vista de crear entrada
Route::post('/entries','EntryController@store')->name('entries.store');//guarda una entrada nueva en la bd


Route::get('/entries/{entryBySlug}','GuestController@show')->name('entries.show');//cuando hacen click en el titulo de home llamo al metodo show del guestcontroller, traigo la entrada y muestro la vista  entries.show.blade.php

Route::get('/entries/{entry}/edit','EntryController@edit')->name('entries.edit');
//->middleware('can:update,entry');

Route::patch('/entries/{entry}','EntryController@update')->name('entries.update');
//>middleware('can:update,entry'); Otra forma de evitar que alguien actualice algo que no es suyo malditos hackers mira todo lo que hay que hacer


Route::get('/@{user}','UserController@show')->name('user.show');

//Route::get('/entries/{entry}','EntryController@show')->name('users.show');

