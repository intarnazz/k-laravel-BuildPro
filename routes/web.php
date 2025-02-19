<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
  $request = Request::instance();
  $request->headers->set('take', 4);
  $catalogController = app(CatalogController::class);
  $response = $catalogController->get($request);
  $catalogs[] = json_decode($response->getContent(), true)['data'];
  $catalogController = app(PortfolioController::class);
  $response = $catalogController->get($request);
  $catalogs[] = json_decode($response->getContent(), true)['data'];
  return view('index', compact('catalogs'));
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
  $catalog = $res['data'];
  return view('catalog', compact(
    'res',
    'catalog',
    'count',
    'page',
    'order',
    'direction',
  ));
})->name('catalog');

Route::get('/portfolio', function () {
  $count = 9 * 2;
  $request = Request::instance();
  $page = $request->query('page', 1);
  $order = $request->query('order', 'views');
  $direction = $request->query('direction', 'desc');
  $request->headers->set('skip', ($page - 1) * $count);
  $request->headers->set('take', $count);
  $request->headers->set('order', $order);
  $request->headers->set('direction', $direction);
  $app = app(PortfolioController::class);
  $response = $app->get($request);
  $res = json_decode($response->getContent(), true);
  $catalog = $res['data'];
  return view('portfolio', compact(
    'res',
    'catalog',
    'count',
    'page',
    'order',
    'direction',
  ));
})->name('portfolio');

Route::get('/catalog/{catalog}', function (\App\Models\Catalog $catalog) {
  $catalog->views += 1;
  $catalog->save();
  $item = $catalog->full();
  $catalog = \App\Models\Portfolio::with(['image'])
    ->where('type', $item['type'])
    ->skip(0)
    ->take(4)
    ->get();
  return view('item', compact('item', 'catalog'));
})->name('item');

Route::get('/portfolio/{portfolio}', function (\App\Models\Portfolio $portfolio) {
  $portfolio->views += 1;
  $portfolio->save();
  $item = $portfolio->full();
  return view('item', compact('item'));
})->name('portfolio-item');

Route::get('/registration', function () {
  return view('form');
})->name('register');

Route::get('/authorization', function () {
  return view('form');
})->name('login');

Route::get('/profile', function () {
  return view('profile');
})->name('profile');


