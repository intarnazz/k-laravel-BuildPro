<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplicationController;


Route::post('/authorization', [UserController::class, 'login']);
Route::post('/registration', [UserController::class, 'reg']);

Route::get('/image/{image}', [ImageController::class, 'get'])->name('image');

Route::get('/catalog', [CatalogController::class, 'get']);
Route::get('/catalog/{catalog}', [CatalogController::class, 'id']);

Route::middleware('auth:api')->group(function () {
  Route::post('/image', [ImageController::class, 'add']);
  Route::get('/user', [UserController::class, 'get']);
  Route::get('/logout', [UserController::class, 'logout']);

  Route::post('/comment', [CommentController::class, 'add']);
  Route::patch('/comment/{comment}', [CommentController::class, 'patch']);
  Route::delete('/comment/{comment}', [CommentController::class, 'delete']);

  Route::post('/application', [ApplicationController::class, 'add']);
  Route::patch('/application/{application}', [ApplicationController::class, 'patch']);
  Route::delete('/application/{application}', [ApplicationController::class, 'delete']);
});

