<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MascotaController extends Controller
{
  public function show(Request $request)
  {
    Log::info('MascotaController. show');
    $user = Auth::user();
    Log::info($user);
    Log::info($user->id);
    $result = Mascota::join('veterinaria.responsable_mascota', 'veterinaria.mascota.id', '=', 'responsable_mascota.mascota_id')->join('veterinaria.responsable', 'responsable_mascota.responsable_id', '=', 'veterinaria.responsable.id')->get();
    Log::info($result);
    return view('mascota', [
      'mascotas' => $result
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
    return redirect('/mascota');
  }
}
