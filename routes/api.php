<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ComerciosController;
use App\Http\Controllers\Api\RubrosController;
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
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//login user
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/registrarse', [AuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('comercios', ComerciosController::class);
$router->get('comercios/{comercio}/enable',[ComerciosController::class, 'enableStatus']);
$router->get('comercios/{comercio}/disable',[ComerciosController::class, 'disableStatus']);
Route::apiResource('rubros',   RubrosController::class);

//$router->get('comercios',[EmpresaController::class, 'index']);
/*$router->group(['prefix' => 'api'], function() use ($router)
{


    //$router->post('registro','AuthController@register');
    //$router->post('login',   'AuthController@login');

});*/



