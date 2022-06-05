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


Route::group(['namespace' => 'App\Http\Controllers'], function () {
  /**
   * Home Routes
   */
  Route::get('/', 'HomeController@index')->name('home.index');
  
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
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('index');
  
    /**
     * Especie Routes
     */
    Route::resource('mascota', 'MascotaController');
    Route::resource('servicio', 'ServicioController');
    Route::resource('turno', 'TurnoController');
    Route::get('turno-fecha', 'TurnoController@fecha')->name('turno.fecha');
    Route::resource('consulta', 'ConsultaController');
    Route::get('consulta-activa', 'ConsultaController@activa')->name('consulta.activa');
    Route::post('consulta-buscar', 'ConsultaController@buscar')->name('consulta.buscar');
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
