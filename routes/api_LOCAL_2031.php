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

Route::group(['middleware' => ['auth.jwt']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/ 
    Route::post('closed', 'DataAccessController@closed');
});
 