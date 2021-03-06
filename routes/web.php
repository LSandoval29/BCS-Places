<?php
use App\Municipio;
use App\Lugar;


Route::get('/', function () {//Vista raíz
    return view('mapa');
});

Route::get('/mapa', function () {//Sera la vista donde salga el mapa.
    return view('mapa');
});

Route::get('/login', function () {//Vista del login.
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//Ruta cuando se hace login.
Route::get('/lugares.crear', 'lugarController@index')->name('lugares.crear');//Ruta que muestra el formulario de crear
Route::get('/options', 'lugarController@view_options')->name('options');//Ruta que muestra el formulario de crear

//Municipios:
Route::get('/municipios/', 'MunicipioController@index')->name('municipios');//Ruta para mostrar la tabla del crud de municipios
Route::get('/municipio/{id}', 'LugarController@getPlacesByMunicipio')->name('lugar_municipio');//Ruta para obtener los lugares que pertenecen a un municipio especifico(Vista)
Route::post('/municipios', 'MunicipioController@store')->name('municipios.store');//Ruta para agregar
Route::get('/municipios/get/{id}','MunicipioController@get');
Route::put('/municipios', 'MunicipioController@update')->name('municipios.update');
Route::delete('/municipios/{id}', 'MunicipioController@destroy');



//Lugares:
Route::get('/getPlaces/{id}', 'LugarController@getPlaces')->name('getPlaces');//Ruta para obtener los lugares que pertenecen a un municipio especifico
Route::get('/getPlacesById/{id}', 'LugarController@getPlacesById')->name('get_places_by_id');//Ruta para obtener los lugares por id
Route::get('/getPlacesByCategory/{idMunicipio}/{idCategory}', 'LugarController@getPlacesByCategory')->name('get_places_by_category');//Ruta para obtener los lugares por categoria
Route::get('/getAllPlaces/', 'LugarController@getAllPlaces')->name('getAllPlaces');

Route::get('/categorias', 'CategoriaController@index')->name('categorias');//Ruta para obtener todas las categorias.

Route::post('/agregar_lugar', 'lugarController@store')->name('agregar_lugar');//Ruta para agregar lugares
Route::get('/editar_lugar/{id}', 'lugarController@editar')->name('editar_lugar');//Ruta pintar la informacion del registro seleccionado
Route::put('/editar_lugar/{id}', 'lugarController@update')->name('actualizar_lugar');//Ruta pintar actualizar la informacion
Route::delete('/eliminar_lugar/{id}', 'lugarController@destroy')->name('eliminar_lugar');//Ruta pintar actualizar la informacion

//Rutas de users
Route::put('/update-password', 'UserController@update_password')->name('update-password');//Ruta para actualizar la password
Route::get('/users', 'UserController@index');//Ruta que muestra el index de users
Route::post('/users', 'UserController@store')->name('users.store');//Ruta para agregar users
Route::get('/users/get/{id}','UserController@get');
Route::put('/users', 'UserController@update')->name('users.update');
Route::delete('/users/{id}', 'UserController@destroy');






