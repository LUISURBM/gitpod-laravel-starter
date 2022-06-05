<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    Log::info('ServicioController.index');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $result = Servicio::select('veterinaria.servicio.*')->get();
    Log::info($result);
    return view('servicio.index', [
      'servicios' => $result
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
    Log::info('ServicioController.edit');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    Log::info($id);
    $servicio = Servicio::select('veterinaria.servicio.*')->where('veterinaria.servicio.id', '=', $id)->first();
    Log::info($servicio);
    $salas = Sala::select('veterinaria.sala.*')->get();
    return view('servicio.edit', compact('servicio'), ['salas' => $salas]);
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
    Log::info('ServicioController.update');
    Log::info($request);
    Log::info($id);
    $validatedData = $request->validate([
      'nombre' => 'required|max:30',
      'id' => 'required',
      'fecha' => 'required',
      'duracion_minutos' => 'required',
      'incapacidad_dias' => 'required',
      'valor_total' => 'required',
      'sala_id' => 'nulleable',
    ]);
    Log::info($validatedData);
    Servicio::whereId($id)->update($validatedData);

    return redirect('/servicio')->with('success', 'Servicio ✅');
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
