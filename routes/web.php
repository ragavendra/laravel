<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// $this->app->bind()

class Service {

}

/*
Route::get('/', function (Service $service) {
    die($service::class);
    // return view('welcome');
});*/

Route::get('/', function (Request $request) {
    $service = $request->route('');
    if ($service == '') {
        $service = '';
    }
    
    // echo $request->host() .''. $service .'';
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Greeting page';
});

Route::get('/user', [UserController::class, 'index']);   

Route::get('/profiles', function () {
    return 'Profiles page';
});

Route::redirect('/here', '/profiles');

Route::redirect('/here1', '/profiles', 301);

Route::permanentRedirect('/here2', 'profiles');

Route::view('/welcome', 'welcome', ['name' => 'Raga']);

Route::get('/user/{id}', function (string $id) {
    return 'User ' . $id;
});

Route::get('/posts/{post}/comments/{comment?}', function (Request $request, string $postId, ?string $commentId = 'default') {
    return 'User ' . $postId . ' ' .$commentId;// ...
});
