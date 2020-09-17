<?php

use Illuminate\Http\Request;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

<<<<<<< HEAD
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::post('open', 'DataAccessController@open');
Route::post('getAuthenticatedUser', 'UserController@getAuthenticatedUser');
Route::post('logout', 'UserController@logout');

Route::group(['middleware' => ['auth.jwt']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/ 
    Route::post('closed', 'DataAccessController@closed');
});
 
=======

//Rol rutas
Route::post('rol','Rolcontroller@createRol')->name('createRol');
Route::get('rol','Rolcontroller@getRol')->name('obtenerRol');
Route::delete('rol/{idRol}','Rolcontroller@deleteRol')->name('deleteRol');
Route::PUT('rol/{id}','Rolcontroller@updateRol')->name('updateRol');

//Status Rutas
Route::get('status','Statuscontroller@getallStatus')->name('getallStatus');

//Service rutas
Route::post('service','ServiceController@createService')->name('createService');
Route::get('service','ServiceController@getallService')->name('getallService');
Route::delete('service/{idRol}','ServiceController@deleteService')->name('deleteService');
Route::PUT('service/{id}', 'ServiceController@updateService')->name('updateService');

>>>>>>> development
