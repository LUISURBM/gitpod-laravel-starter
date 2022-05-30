<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;
use Illuminate\Support\Facades\Log;

class EspecieController extends Controller
{
  public function show()
  {
      Log::info('An informational message.');
      $data = Especie::all();
      var_dump($data);
      return view('especie', [
          'especie' => $data
      ]);
  }
}
