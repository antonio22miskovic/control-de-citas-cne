<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buscar/{ci}', 'HomeController@buscar');
Route::get('/id/{ci}', 'HomeController@id');
Route::get('/validarci/{ci?}', 'HomeController@validarci');
Route::get('/perfil', 'HomeController@perfil');
Route::get('/contador', 'HomeController@contador');

Route::resource('user', 'UserController');
Route::resource('tramite', 'TramiteController');
Route::resource('rol', 'RolController');
Route::resource('notificacion', 'NotificacionController');
Route::resource('solicitud', 'SolicitudController');
Route::resource('cliente', 'ClienteController');

Route::get('/admin','AdminController@vista');
Route::get('/admin/{id}','AdminController@filtroporusuario');
Route::post('admin/resgistro','AdminController@registro');

Route::get('estadisticas','EstadisticasController@estadisticas');
Route::get('estadisticas/detalles/{id}','EstadisticasController@estadisticauser');
Route::get('estadisticas/usuarios','EstadisticasController@listadousuarios');