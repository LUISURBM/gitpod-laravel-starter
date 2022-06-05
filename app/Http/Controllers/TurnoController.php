<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Google;
use App\Models\Profesional;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascota;
use App\Models\Responsable;
use App\Models\Servicio;
use App\Models\Turno;
use Google\Service\Calendar\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
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

    foreach ($results as $item) {
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
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.user_id', '=', $user->id)->get();
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

    foreach ($results as $item) {
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
    $mascotas = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.user_id', '=', $user->id)->get();
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
    Log::info('TurnoController.store');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    Log::info($request);
    $validatedData = $request->validate([
      'fecha' => 'required',
      'profesional_id' => 'required',
      'mascota_id' => 'required',
      'servicio_id' => 'required',
    ]);
    Log::info($validatedData);
    $turno = Turno::create($validatedData);
    Log::info($turno);


    $mascota_id = Mascota::select('veterinaria.mascota.*')->where('veterinaria.mascota.id', '=', $validatedData['mascota_id'])->first();
    Log::info($mascota_id);
    $responsable_id = Responsable::select('veterinaria.responsable.*')->join('veterinaria.responsable_mascota', 'responsable.id', '=', 'responsable_mascota.responsable_id')->where('responsable_mascota.mascota_id', '=', $mascota_id->id)->first();
    Log::info($responsable_id);
    $servicio_id = Servicio::select('veterinaria.servicio.*')->where('veterinaria.servicio.id', '=', $validatedData['servicio_id'])->first();
    Log::info($servicio_id);
    $profesional_id = Profesional::select('veterinaria.profesional.*')->where('veterinaria.profesional.id', '=', $validatedData['profesional_id'])->first();
    Log::info($profesional_id);
    Log::info($validatedData['fecha']);

    Log::info('TurnoController.event');
    putenv('GOOGLE_APPLICATION_CREDENTIALS=../google-account.json');

    $client = new \Google_Client();
    $credentials_file = '../google-account.json';
    // $client->setAuthConfig($credentials_file);
    $client->useApplicationDefaultCredentials();
    $client->setApplicationName("Veterinaria App");
    $client->setScopes(['https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.events']);
    $service = new \Google\Service\Calendar($client);

    /************************************************
      We're just going to make the same call as in the
      simple query as an example.
     ************************************************/
    $calendar = new Calendar;
    $calendar->setSummary('VetApp');
    $calendar = $service->calendars->insert($calendar);
    Log::info(serialize($calendar));
    $calendar = $service->calendars->get('ecbh0stqfppk0o5gpnsthefvc8@group.calendar.google.com');
    Log::info(($calendar->getTimeZone()));
    // $calendarList = $service->calendarList->listCalendarList()->getItems();
    // Log::info(serialize($calendarList));
    $optParams = array(
      'maxResults' => 10,
      'orderBy' => 'startTime',
      'singleEvents' => true,
      'timeMin' => date('c'),
    );
    $results = $service->events->listEvents('ecbh0stqfppk0o5gpnsthefvc8@group.calendar.google.com', $optParams);
    $events = $results->getItems();

    if (empty($events)) {

      Log::info("No upcoming events found.");
    } else {

      Log::info("Upcoming events:\n");
      foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
          $start = $event->start->date;
        }
        Log::info($event->getSummary());
        Log::info($start);
      }
    }


    $query = 'ecbh0stqfppk0o5gpnsthefvc8@group.calendar.google.com';
    $event = new Event;
    $event->summary = $servicio_id->nombre . " " . $mascota_id->nombre;
    $event->name = $servicio_id->nombre . " " . $mascota_id->nombre;
    $event->description = $servicio_id->nombre . " " . $mascota_id->nombre;
    $event->startDateTime = \Carbon\Carbon::now();
    Log::info("...\n");
    $event->endDateTime = \Carbon\Carbon::now()->addHour();
    // $event->end = \Carbon\Carbon::now()->addHour();
    $eventdate = new EventDateTime();
    $eventdate->setDateTime(\Carbon\Carbon::parse($turno->fecha));
    $eventdateEnd = new EventDateTime();
    $eventdateEnd->setDateTime(\Carbon\Carbon::parse($turno->fecha));
    $event->setStart($eventdate);
    $event->start = $eventdate;
    $event->startTime = $eventdate;
    $event->startDateTime = $eventdate;
    $event->setEnd($eventdateEnd);
    $event->end = $eventdateEnd;
    $event->endTime = $eventdateEnd;
    $event->endDateTime = $eventdateEnd;
    Log::info(serialize($event->start));
    Log::info(serialize($event->end));
    $attendees = array(0 => ['email' => $responsable_id->correo], 1 => ['email' => $profesional_id->correo]);
    $event->setAttendees($attendees);
    // Log::info(serialize($event));

    $results = $service->events->insert('ecbh0stqfppk0o5gpnsthefvc8@group.calendar.google.com', $event);
    // Log::info(serialize($results));


    // Log::info(serialize($event));
    // Log::info($event->htmlLink);


    return redirect('/turno')->with('success', 'Turno ✅');
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
