<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\Profesional;
use App\Models\Turno;
use App\Models\VisitaMascota;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    Log::info('ConsultaController.index');
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

    foreach ($results as $item) {
      Log::info(1);
      Log::info($item['summary']);
      Log::info($item['description']);
      Log::info($item['end']['dateTime']);
      Log::info($item->getStart()->getDateTime());
    }

    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.id', $user->id)->get();
    Log::info($mascotas);
    $veterinario_id = 0;
    return view('consulta.index', [
      'mascotas' => $mascotas
    ])->with('veterinario_id', $veterinario_id);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function buscar(Request $request)
  {
    Log::info('ConsultaController.buscar');
    Log::info($request);
    $user = Auth::user();
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.id', $user->id)->get();
    Log::info($mascotas);
    return view('consulta.buscar', [
      'mascotas' => $mascotas
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function activa(Request $request)
  {
    Log::info('ConsultaController.activa');
    Log::info($request);
    $user = Auth::user();
    Log::info((VisitaMascota::select('veterinaria.visita_mascota.turno_id')->where('id', '>', 1)->get()));
    $mascotas = Turno::select('veterinaria.turno.id as turno_id','veterinaria.mascota.*', 'veterinaria.servicio.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.mascota', 'turno.mascota_id', '=', 'mascota.id')->join('veterinaria.servicio', 'servicio.id', '=', 'turno.servicio_id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->whereNotIn('turno.id', function($query){
      $query->select('turno_id')
      ->from(with(new VisitaMascota)->getTable())
      ->where('id', '>', 1);
  })->orderBy('veterinaria.turno.fecha', 'ASC')->get();
    Log::info($mascotas);
    return view('consulta.activa', [
      'mascotas' => $mascotas
    ]);
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
    Log::info('ConsultaController.edit');
    
    $idd = decrypt($id);
    Log::info(($idd));
    $user = Auth::user();
    Log::info($user->id);

    $turno = Turno::select('veterinaria.turno.*')->where('veterinaria.turno.id', '=', $idd)->first();
    Log::info($turno);
    
    $mascota = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->join('veterinaria.turno', 'veterinaria.turno.mascota_id', '=', 'veterinaria.mascota.id')->where('veterinaria.mascota.id', '=', $turno->mascota_id)->first();
    Log::info($mascota);

    $servicio = Servicio::select('veterinaria.servicio.*')->where('veterinaria.servicio.id', '=', $turno->servicio_id)->get();
    Log::info($servicio);
    return view('consulta.index', [
      'mascota' => $mascota,
      'servicio' => $servicio
    ]);
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
