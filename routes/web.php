<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SingleActionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\EnsureUserHasRole;

// use Illuminate\Auth\Middleware\Authenticate;

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

/*
Route::get('/user/{id}', function (string $id) {
    return 'User ' . $id;
});*/

Route::get('/user/{id}', [UserController::class,'show'])->middleware('auth');

Route::get('/posts/{post}/comments/{comment?}', function (Request $request, string $postId, ?string $commentId = 'default') {
    return 'User ' . $postId . ' ' .$commentId;// ...
});

// can be ::post
Route::get('singleActionCtrllr', SingleActionController::class);

Route::resource('photos', PhotoController::class)
->missing(function (Request $request) {
    return Redirect::route('photos.index');
})
->withTrashed(['show']);

/*
Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
 
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

// /photos/{photo}/comments/{comment}
Route::resource('photos.comments', PhotoCommentController::class)->shallow();

Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
]);

Route::resource('users', AdminUserController::class)->parameters([
    'users' => 'admin_user'
]);
/users/{admin_user}

Route::resource('photos.comments', PhotoCommentController::class)->scoped([
    'comment' => 'slug',
]);
/photos/{photo}/comments/{comment:slug}


*/

Route::withoutMiddleware([EnsureTokenIsValid::class])->group(function () {

    Route::get('/profile', function (Request $request) {
        return 'Proflies page';
    })->middleware('role:editor');
});
// })->middleware([Authenticate::class, Authenticate::class]);
// })->middleware('auth.basic');
// })->withoutMiddleware([EnsureTokenIsValid::class]);

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();

    if($token == csrf_token()) {
        echo "You are welcome!";
    }
    else {
        echo "Please check your access!";
    }

    /*
    echo "Req token is " . $token;

    echo "Token is " . csrf_token();
    */
});