<?php



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('tramite', 'TramiteController');
Route::resource('rol', 'RolController');
Route::resource('notificacion', 'NotificacionController');

