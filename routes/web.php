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

// Route::get('/mascota/{color}', [MascotaController::class, 'show']);
// Route::resource('especies', EspeciesController::class);

Route::group(['namespace' => 'App\Http\Controllers'], function () {
  /**
   * Home Routes
   */
  Route::get('/', 'HomeController@index')->name('index');

  /**
   * Especie Routes
   */
  Route::get('/mascota', 'MascotaController@show')->name('mascota.show');
  Route::post('/mascota', 'MascotaController@perform')->name('mascota.perform');
  
  Route::group(['middleware' => ['guest']], function () {
    /**
     * Register Routes
     */
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
  });

  Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
  });
});

/**
 * BEGIN: Injected from .gp/snippets/laravel/routes/web/allow-mixed-web.snippet
 */

$url = config('app.url');
resolve(\Illuminate\Routing\UrlGenerator::class)->forceRootUrl($url);
resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');

/**
 * END: Injected from .gp/snippets/laravel/routes/web/allow-mixed-web.snippet
 */
