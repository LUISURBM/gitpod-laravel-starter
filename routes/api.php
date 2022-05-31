<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Especie;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('especie', function() {
  // If the Content-Type and Accept headers are set to 'application/json', 
  // this will return a JSON structure. This will be cleaned up later.
  return Especie::all();
});

Route::get('especie/{id}', function($id) {
  return Especie::find($id);
});

Route::post('especie', function(Request $request) {
  return Especie::create($request->all);
});

Route::put('especie/{id}', function(Request $request, $id) {
  $especie = Especie::findOrFail($id);
  $especie->update($request->all());

  return $especie;
});

Route::delete('especie/{id}', function($id) {
  Especie::find($id)->delete();

  return 204;
});

Route::middleware('auth:api')->get('/auth', function(Request $request) {
  return $request->user();
});