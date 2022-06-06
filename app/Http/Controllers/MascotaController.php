<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Responsable;
use App\Models\ResponsableMascota;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    Log::info('MascotaController.index');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $result = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.user_id', '=', $user->id)->get();
    Log::info($result);
    return view('mascota.index', [
      'mascotas' => $result
    ]);
  }

  public function show($id)
  {
    Log::info('MascotaController.show');
    Log::info($id);
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $result = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.user_id','=', $user->id)->where('veterinaria.mascota.id', '=', $id)->first();
    $result->especie_id = ''.$result->especie_id.'';
    $result->esterilizado = $result->esterilizado == 1 ? true : false;
    Log::info($result);
    return view('mascota.edit', [
      'mascota' => $result
    ]);
  }

  /**
   * Handle account login request
   * 
   * @param LoginRequest $request
   * 
   * @return \Illuminate\Http\Response
   */
  public function perform()
  {
    return redirect('/mascota.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('mascota.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Log::info('MascotaController.store');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $validatedData = $request->validate([
      'nombre' => 'required|max:30',
      'nacimiento' => 'required',
      'adquisicion' => 'required',
      'color' => 'required',
      'especie_id' => 'required',
      'genero_id' => 'required',
      'raza_id' => 'required',
      'esterilizado' => 'nullable|boolean',
      'obervaciones' => 'required|max:200',
    ]);
    $validatedData['genero_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['genero_id'])[0]));
    $validatedData['raza_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['raza_id'])[0]));
    $validatedData['especie_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['especie_id'])[0]));
    $validatedData['esterilizado'] = isset($validatedData['esterilizado']) && $validatedData['esterilizado'] == 'on' ? true : false;
    Log::info($validatedData);
    $show = Mascota::create($validatedData);
    Log::info($show);
    $responsable_id = Responsable::select('veterinaria.responsable.id')->where('veterinaria.responsable.user_id', '=', $user->id)->first();
    Log::info($responsable_id);
    $responsable = new ResponsableMascota();
    $responsable->responsable_id = $responsable_id->id;
    $responsable->mascota_id = $show->id;
    $responsable->save();
    // $responsableMascota = ResponsableMascota::create($responsable);
    Log::info($show);

    return redirect('/mascota')->with('success', 'Game is successfully saved');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    Log::info('MascotaController.edit');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    Log::info($id);
    $mascota = Mascota::select('veterinaria.mascota.*', 'veterinaria.genero.nombre as genero', 'veterinaria.raza.nombre as raza', 'veterinaria.especie.nombre as especie')->join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->join('veterinaria.genero', 'mascota.genero_id', '=', 'veterinaria.genero.id')->join('veterinaria.raza', 'mascota.raza_id', '=', 'veterinaria.raza.id')->join('veterinaria.especie', 'mascota.especie_id', '=', 'veterinaria.especie.id')->where('veterinaria.responsable.user_id','=', $user->id)->where('veterinaria.mascota.id', '=', $id)->first();

    

    Log::info($mascota);
    return view('mascota.edit', compact('mascota'));
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
    Log::info('MascotaController.update');
    Log::info($request);
    Log::info($id);
    $validatedData = $request->validate([
      'nombre' => 'required|max:30',
      'id' => 'required',
      'nacimiento' => 'required',
      'adquisicion' => 'required',
      'color' => 'required',
      'especie_id' => 'required',
      'genero_id' => 'required',
      'raza_id' => 'required',
      'obervaciones' => 'required|max:200',
    ]);
    $validatedData['genero_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['genero_id'])[0]));
    $validatedData['raza_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['raza_id'])[0]));
    $validatedData['especie_id'] = (preg_replace('/\s+/', '',explode('~',$validatedData['especie_id'])[0]));
    $validatedData['esterilizado'] = ($validatedData['especie_id'] ? 1 : 0);
    Log::info($validatedData);
    Mascota::whereId($id)->update($validatedData);

    return redirect('/mascota')->with('success', 'Game Data is successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $game = Mascota::findOrFail($id);
    $game->delete();

    return redirect('/mascota')->with('success', 'Game Data is successfully deleted');
  }
}
