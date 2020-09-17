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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::post('open', 'DataAccessController@open');
Route::post('getAuthenticatedUser', 'UserController@getAuthenticatedUser');
Route::post('logout', 'UserController@logout');
Route::post('ReferAuth', 'ReferUserController@addReferred');


Route::group(['middleware' => ['auth.jwt']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
    Route::post('closed', 'DataAccessController@closed');

});

//Email rutas
Route::post('email','EmailController@sendEmail')->name('sendEmail');

//Admin rutas
Route::post('admingetall','AdminController@getAllUserSystem')->name('getAllUserSystem');
Route::post('admin/{id}','AdminController@updateStatus')->name('updateStatus');
Route::put('updatepercent/{id}','AdminController@updatepercent')->name('updateStatus');
Route::put('updateUser/{id}','AdminController@updateUser')->name('updateStatus');

//Rol rutas
Route::post('rol','Rolcontroller@create')->name('createRol');
Route::get('rol','Rolcontroller@getAll')->name('obtenerRol');
Route::delete('rol/{idRol}','Rolcontroller@delete')->name('deleteRol');
Route::PUT('rol/{id}','Rolcontroller@update')->name('updateRol');

//Status Rutas
Route::post('status','Statuscontroller@create')->name('createRol');
Route::get('status','Statuscontroller@getAll')->name('getallStatus');
Route::delete('status/{idstatus}','Statuscontroller@delete')->name('deleteRol');
Route::PUT('status/{id}','Statuscontroller@update')->name('updateRol');

//Service rutas
Route::post('service','ServiceController@create')->name('createService');
    Route::get('service','ServiceController@getAll')->name('getallService');
Route::delete('service/{idRol}','ServiceController@delete')->name('deleteService');
Route::PUT('service/{id}', 'ServiceController@update')->name('updateService');

?>
