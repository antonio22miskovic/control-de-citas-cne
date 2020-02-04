<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buscar/{ci}', 'HomeController@buscar');
Route::resource('user', 'UserController');
Route::resource('tramite', 'TramiteController');
Route::resource('rol', 'RolController');
Route::resource('notificacion', 'NotificacionController');
Route::resource('solicitud', 'SolicitudController');

