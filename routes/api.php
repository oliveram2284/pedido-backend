<?php

use App\Http\Controllers\Api\ComerciosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('comercios', ComerciosController::class);
//$router->get('comercios',[EmpresaController::class, 'index']);
/*$router->group(['prefix' => 'api'], function() use ($router)
{


    //$router->post('registro','AuthController@register');
    //$router->post('login',   'AuthController@login');

});*/



