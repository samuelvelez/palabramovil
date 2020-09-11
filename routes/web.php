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


/*Route::get('/perfil', function () {
    return view('perfil');
});*/

//Route::post('persona/store', 'PersonaController@store');

// Routes for anyone
Route::get('/', function () {
    return view('home');
});
Route::get('/politicasprivacidad', function () {
    return view('politicasprivacidad');
});

/************* SOCIAL LOGIN *************/
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::resource('/libro', 'LibroController');
Route::get('/libros', 'LibroController@libros')->name('libros');
Route::get('/resultados', 'LibroController@resultados')->name('resultados');

// Routes for guests only
Route::group(['middleware' => 'guest'], function() {
   
});

Route::group(['prefix' => 'messages','middleware' => 'auth'], function () {
	Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create/{id}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    //Route::put('{id}', ['as' => 'messages.confirmarPeticion', 'uses' => 'MessagesController@confirmarPeticion']);
});
// Routes for logged in users
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('user/{id}', 'UserController@perfilpublico')->name('perfilpublico');

	Route::resource('/persona', 'PersonaController');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/panelcontrol', 'LibroController@panelcontrol')->name('panelcontrol');
	Route::get('/perfil', 'UserController@index')->name('perfil'); //
	Route::get('prestamo/{id}/{idlibro}', 'UserController@prestamo')->name('prestamo');
	Route::get('confirmacionlibro/{id}', 'UserController@confirmacionlibro')->name('confirmacionlibro');
	Route::get('negacionlibro/{id}/{valor}', 'UserController@negacionlibro')->name('negacionlibro');
    Route::get('/subirlibros', 'LibroController@subirlibros')->name('subirlibros'); //usuario
    Route::get('/notificacion', 'UserController@notificacion')->name('notificacion'); // usuario
	Route::get('/pedidos', 'UserController@pedidos')->name('pedidos'); // usuario
	Route::get('/registrosolicitudes', 'UserController@registrosolicitudes')->name('registrosolicitudes');
	Route::get('/registro', 'UserController@registro')->name('registro');
	Route::get('/biblioteca', 'UserController@biblioteca')->name('biblioteca'); // ususario
	Route::get('/editarperfil/{id}', 'UserController@editarperfil')->name('editarperfil');
	Route::get('/editarlibro/{id}', 'LibroController@editarlibro')->name('editarlibro');
	Route::post('registro', 'UserController@confirmarPeticion')->name('confirmarPeticion');
	Route::post('{id}', 'PersonaController@update')->name('updatepersona');
	Route::post('libro/{id}', 'LibroController@update')->name('libroupdate');
	Route::get('/{id}', 'LibroController@eliminarlogico')->name('eliminarlogico');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
