<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

//==================================CLIENT==================================================
Route::prefix('/')->group(function () {
    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);
    Route::resource('/', \App\Http\Controllers\HomeController::class);
    Route::get('/product', 'App\Http\Controllers\HomeController@product');
    Route::get('/productDetail/{id}', 'App\Http\Controllers\HomeController@productDetail');
    Route::get('/blog', 'App\Http\Controllers\HomeController@blog');
    Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
    Route::resource('profile', App\Http\Controllers\ClientController::class)->middleware('checkProfile');
});


//================================LOGIN======================================================
Route::prefix('/')->group(function () {
    Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])
        ->name('admin.auth.login');
    Route::post('login', [\App\Http\Controllers\LoginController::class, 'checkLogin'])
        ->name('admin.auth.check-login');

    Route::get('/quen-mat-khau', [\App\Http\Controllers\MailController::class, 'forgotPass']);
    Route::get('/update-new-pass', [\App\Http\Controllers\MailController::class, 'updatePass']);
    Route::post('/recover-pass', [\App\Http\Controllers\MailController::class, 'recoverPass']);
    Route::post('/update-new-pass', [\App\Http\Controllers\MailController::class, 'update_new_pass']);
});

//---------------------------Login google-----------------------------
Route::controller(App\Http\Controllers\SocialController::class)->group(function () {
    Route::get('google', 'redirectToGoogle')->name('auth.google');
    Route::get('google/callback', 'handleGoogleCallback');
    Route::get('google/logout', 'logout');
});


//================================ADMIN======================================================

Route::prefix('admin')->middleware('admin.login')->group(function () {
    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);

    Route::get('/home', 'App\Http\Controllers\AdminController@index')->name('admin.index');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('accountadmin', \App\Http\Controllers\AdminController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    // ->middleware('auth.admin.products');
    Route::resource('style', \App\Http\Controllers\StyleController::class);
    Route::resource('oder', \App\Http\Controllers\OderController::class);
});









//=======================================TEST================================================

Route::get('/templateadmin', function () {
    return view('admin.app');
});

Route::get('/accountadmin', function () {
    return view('admin.account.index');
});

Route::get('/product', function () {
    return view('admin.product.index');
});

Route::get('/product/new', function () {
    return view('admin.product.new');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
