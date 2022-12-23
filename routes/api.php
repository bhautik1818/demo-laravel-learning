<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\StudentController;
use App\Http\Controllers\Api\V2\StudentController as V2StudentController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/hello', function () {
        return "hello welcome";
    });
    //    $api->group(['middleware' => 'api'], function ($api) {
        $api->post('register',  [UserController::class, 'register']);
        $api->post('/login', 'App\Http\Controllers\UserController@login');
        $api->post('/profile', 'App\Http\Controllers\UserController@profile');
    // });
    // Route::apiResource('/student', 'Api\V1\StudentController')
    //     ->only(['index', 'show']);
    $api->get('student', [StudentController::class, 'show']);
});



// $api->version('v2', function ($api) {
//     $api->get('/hello', function () {
//         return "hello welcome version 2";
//     });
//     // Route::apiResource('/student', 'Api\V2\StudentController')
//     //     ->only(['index', 'show']);
//     $api->get('student', [V2StudentController::class, 'show']);
// });

// $api->version(['v1', 'v2'], function ($api) {
//     $api::prefix('v1', function ($api) {
//         $api->get('student', [StudentController::class, 'show']);
//         
//     });
// });





$api->version('v1', function ($api) { // Always keep this to v1, and ignore accept header.

    $api->group(['prefix' => 'v1'], function ($api) { // Use this route group for v1

        $api->get('/student', [StudentController::class, 'show']);
    });

    $api->group(['prefix' => 'v2'], function ($api) { // Use this route group for v1

        $api->get('/student', [V2StudentController::class, 'show']);
    });
});