<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function(){
    return view('auth.login');
});

Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('/admin/dashboard', [AdminController::class, 'index']);

Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::resource('/admin/post', PostController::class);

Route::get('/post/{id}', [HomeController::class, 'show']);
Route::post('/post/comment/{id}', [HomeController::class, 'store_comment']);
Route::post('/admin/post/reply_comment/{id}', [PostController::class, 'store_reply_comment']);
