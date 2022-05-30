<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
  public function show($slug)
  {
      return view('mascota', [
          'mascota' => Mascota::where('color', '=', $slug)->first()
      ]);
  }
}
