<?php

use Illuminate\Routing\Router;

Admin::routes();


Route::get('test', function () {
     return response()->json([
            'success'=>true, 
            'message'=>'hello from laravel', 
            'data'=>'mydata'
        ]);
});

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',

], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    
    /*USER ROUTES*/
    $router->resource('users', UserController::class);

    /*PET ROUTES*/
    $router->resource('pets', PetController::class);

    /*SERVICE ROUTES*/
    $router->resource('services', ServiceController::class);

    /*RESERVATION ROUTES*/
    $router->resource('reservations', ReservationController::class);

    /*BOARDING ROUTES*/ 
    $router->resource('boardings', BoardingController::class);
    
    /*CAGE ROUTES*/ 
    $router->resource('cages', CageController::class);

    /*CONSULTATION ROUTES*/
    $router->resource('consultations', ConsultationController::class);

    /*MEDICINE ROUTES*/
    $router->resource('medicines', MedicineController::class);

    /*APPOINTMENT ROUTES*/

    $router->resource('appointments', AppointmentController::class);

    /*VISIT ROUTES*/
    $router->resource('visits/confirmed','UserController@confirmed');

    $router->resource('visits', VisitController::class);

    // $router->resource('visits/confirmed','UserController@confirmed');

    $
   
    });
   