<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::group([
    // 'middleware' => 'api',
// ], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPsswordResetLink','PsswordResetController@sendEmail');
    Route::post('resetPassword','ChangePasswordController@process');
    Route::post('reservations','API\ReservationController@store');
    Route::post('/pet/add','API\PetsController@add');
    Route::get('pets/{id}','API\PetsController@index');
    Route::post('/boardings', 'API\BoardingController@add');
    Route::delete('reservations/{id}', 'API\ReservationController@destroy');
// });

Route::post('signup', 'AuthController@signup');

Route::get('/services', 'API\ServiceController@index');
Route::get('/services/{service}', 'API\ServiceController@show');

    
/*pet register */
Route::post('/pet/add','API\PetsController@add');

//visits apis
Route::get('/visits/all/{id}','API\VisitController@userIndex');
Route::get('/visits/{id}','API\VisitController@showByUser');
Route::post('/visits','API\VisitController@store');
Route::put('/visits/cancel','API\VisitController@updateStatus');

//Appointments apis
Route::get('/appointments','API\AppointmentController@index');
