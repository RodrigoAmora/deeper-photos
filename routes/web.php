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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Controller;

Route::get('/createAlbum', function () {
	return view('album.save');
});

Route::get('/login', function () {
	return view('auth.login');
});
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
	return view('user.save');
});
Route::post('/register', [LoginController::class, 'createUser']);

Route::post('/saveAlbum', [AlbumController::class, 'saveAlbum'])->middleware('auth');

Route::get('/sendPhoto', [PhotoController::class, 'listPhotosByIdAlbum']);
Route::post('/sendPhoto', [PhotoController::class, 'sendPhoto']);

Route::get('/', [Controller::class, 'index']);

/*
Route::get('/', function () {
	if (Auth::check()) {
    	return view('welcome');
	} else {
    	return view('login');
    }
});//->middleware('auth');
*/
