<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\EspeciesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mascota/{color}', [MascotaController::class, 'show']);
Route::resource('especies', EspeciesController::class);

/**
 * BEGIN: Injected from .gp/snippets/laravel/routes/web/allow-mixed-web.snippet
 */

$url = config('app.url');
resolve(\Illuminate\Routing\UrlGenerator::class)->forceRootUrl($url);
resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');

 /**
 * END: Injected from .gp/snippets/laravel/routes/web/allow-mixed-web.snippet
 */