<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostCommentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/flights', function () {
    // Only authenticated users may access this route...
})->middleware('auth:admin');

require __DIR__.'/auth.php';

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user', [UserController::class, 'index']);

Route::resource('photos', PhotoController::class)

    // show soft del models
    // -> withTrashed()
    // -> withTrashed(['show'])

    // handle partial routes
    // ->only(['index', 'show'])
    // ->except(['create', 'store', 'update', 'destroy'])

    // on missing model
    ->missing(function (Request $request) {
        return Redirect::route('photos.index');
    });

Route::resource('posts.comments', PostCommentController::class);

Route::post('/comment/{comment}');
    /*
Route::resources([
    'photos' => PhotoController::class,
   // 'posts' => PostController::class,
]);*/
