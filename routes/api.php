<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CatalogController;


Route::post('/authorization', [UserController::class, 'login']);
Route::post('/registration', [UserController::class, 'reg']);

Route::get('/image/{image}', [ImageController::class, 'get'])->name('image');

Route::get('/catalog', [CatalogController::class, 'get']);
Route::get('/catalog/{catalog}', [CatalogController::class, 'id']);

Route::middleware('auth:api')->group(function () {
  Route::get('/profile', function () {
    $user = auth()->user();
    return view('profile', compact('user'));
  });

  Route::post('/image', [ImageController::class, 'add']);
  Route::get('/user', [UserController::class, 'get']);
  Route::get('/logout', [UserController::class, 'logout']);
});

