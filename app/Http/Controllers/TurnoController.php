<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Google;
use App\Models\Profesional;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascota;
use App\Models\Servicio;

use Google_Service_Calendar;

class TurnoController extends Controller
{
  /**
   * Handle account login request
   * 
   * @param LoginRequest $request
   * 
   * @return \Illuminate\Http\Response
   */
  public function perform()
  {
    return redirect('/turno.nuevo');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function nuevo(Request $request)
  {
    Log::info('TurnoController.nuevo');
    return view('turno.nuevo');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    Log::info('TurnoController.index');
    $client = new \Google_Client();
    $credentials_file = '../google.json';
    $client->setAuthConfig($credentials_file);
    $client->setApplicationName("Veterinaria App");
    $service = new \Google\Service\Books($client);
    $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    $service = new \Google\Service\Calendar($client);
    
    /************************************************
      We're just going to make the same call as in the
      simple query as an example.
     ************************************************/
    $query = '5k09h4s1l9covrgdef34gll9j8@group.calendar.google.com';
    $optParams = [
      'maxResults' => 10,
      'orderBy' => 'startTime',
      'singleEvents' => true,
      'timeMin' => date('c'),
    ];
    $results = $service->events->listEvents($query, $optParams);
    
    foreach ($results as $item){
      Log::info(1);
        Log::info($item['summary']);
        Log::info($item['description']);
        Log::info($item['end']['dateTime']);
        Log::info($item->getStart()->getDateTime());
    }
    
    $result = Profesional::select('veterinaria.profesional.*')->get();
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.id', $user->id)->get();
    Log::info($mascotas);
    $servicios = Servicio::select('veterinaria.servicio.*')->get();
    Log::info($servicios);
    $veterinario_id = 0;
    return view('turno.nuevo', [
      'profesionales' => $result,
      'mascotas' => $mascotas,
      'servicios' => $servicios
    ])->with('veterinario_id', $veterinario_id);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function fecha(Request $request)
  {
    Log::info('TurnoController.fecha');
    $client = new \Google_Client();
    $credentials_file = '../google.json';
    $client->setAuthConfig($credentials_file);
    $client->setApplicationName("Veterinaria App");
    $service = new \Google\Service\Books($client);
    $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    $service = new \Google\Service\Calendar($client);
    
    /************************************************
      We're just going to make the same call as in the
      simple query as an example.
     ************************************************/
    $query = '5k09h4s1l9covrgdef34gll9j8@group.calendar.google.com';
    $optParams = [
      'maxResults' => 10,
      'orderBy' => 'startTime',
      'singleEvents' => true,
      'timeMin' => date('c'),
    ];
    $results = $service->events->listEvents($query, $optParams);
    
    foreach ($results as $item){
      Log::info(1);
        Log::info($item['summary']);
        Log::info($item['description']);
        Log::info($item['end']['dateTime']);
        Log::info($item->getStart()->getDateTime());
    }
    
    $result = Profesional::select('veterinaria.profesional.*')->get();
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.id', $user->id)->get();
    Log::info($mascotas);
    $servicios = Servicio::select('veterinaria.servicio.*')->get();
    Log::info($servicios);
    $veterinario_id = 0;
    return view('turno.index', [
      'profesionales' => $result,
      'mascotas' => $mascotas,
      'servicios' => $servicios
    ])->with('veterinario_id', $veterinario_id);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
