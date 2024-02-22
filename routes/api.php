<?php

// use App\Http\Middleware\Authenticate;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StopsController;
use App\Http\Controllers\UserController;
// use App\Services\GitHub;
use App\Models\User;

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

Route::get('/arr', function () {
    return [1, 2, 3];
});

// Route::get('/user/{id}', [UserController::class, 'show']);

// Route::apiResource('photos', PhotoController::class);
Route::get('/user/{user}', function (User $user) {
    return $user;
});

Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {

    // to controller
    Route::post('/stopsNearMe', function (Request $request) {

        // echo 'Request is ' . $request->input('latitude');
        /*
    return response()->json([
        'latitude' => $request->input('Latitude'),
        'longitude'=> $request->input('Longitude')
    ])
    ->cookie('token', 'tokenVal', 3)
    ->header('One', 'One Val'); */
        echo "Lat " . $request->input('Latitude') . " Long ". $request->input('Longitude');

        // return redirect()->action([StopsController::class, 'index'], ['latitude' => $request->input('Latitude'), 'longitude' => $request->input('Longitude')]);
        // return redirect()->action("StopsController::class", [$request->input('Latitude'), $request->input('Longitude')]);
    });
});

    /*
Route::get('/ghub', function (Request $request) {

return response()->streamDownload(function () {
    echo GitHub::api('repo')
                ->contents()
                ->readme('laravel', 'laravel')['contents'];
}, 'laravel-readme.md');
});*/

// excl api access to create and edit
Route::apiResource('photos', PhotoController::class);

/*
Route::apiResources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);*/

Route::get('/someFile', function (Request $request) {
    return response()->file(public_path('robots.txt'));
});
