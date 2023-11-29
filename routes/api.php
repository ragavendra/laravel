<?php

// use App\Http\Middleware\Authenticate;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StopsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['get','post'],'/', function () {
});

Route::any('/', function () {

});

// DI
Route::get('/users', function (Request $request) {

});

// Route::apiResource('photos', PhotoController::class);

// to controller
Route::post('/stopsNearMe', function (Request $request) {

    # echo 'Request is ' . $request->input('latitude');
    return response()->json([
        'latitude' => $request->input('Latitude'),
        'longitude'=> $request->input('Longitude')
    ]);

    // return redirect()->action([StopsController::class,'index'], ['latitude' => 1, 'longitude' => 6]);
});

Route::apiResources([
    'photos' => PhotoController::class,
   // 'posts' => PostController::class,
]);