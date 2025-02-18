<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
  $request = Request::instance();
  $request->headers->set('take', 4);
  $catalogController = app(CatalogController::class);
  $response = $catalogController->get($request);
  $catalog = json_decode($response->getContent(), true)['data'];
  return view('index', compact('catalog'));
})->name('home');


Route::get('/catalog', function () {
  $count = 9 * 2;
  $request = Request::instance();
  $page = $request->query('page', 1);
  $order = $request->query('order', 'views');
  $direction = $request->query('direction', 'desc');
  $request->headers->set('skip', ($page - 1) * $count);
  $request->headers->set('take', $count);
  $request->headers->set('order', $order);
  $request->headers->set('direction', $direction);
  $app = app(CatalogController::class);
  $response = $app->get($request);
  $res = json_decode($response->getContent(), true);
  return view('catalog', compact(
    'res',
    'count',
    'page',
    'order',
    'direction',
  ));
})->name('catalog');

Route::get('/catalog/{catalog}', function (\App\Models\Catalog $catalog) {
  $catalog->views += 1;
  $catalog->save();
  $catalog->full();
  return view('item', compact('catalog'));
})->name('item');

Route::get('/registration', function () {
  return view('form');
})->name('register');

Route::get('/authorization', function () {
  return view('form');
})->name('login');

Route::get('/profile', function () {
  return view('profile');
})->name('profile');


