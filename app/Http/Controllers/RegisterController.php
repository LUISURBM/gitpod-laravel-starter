<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Responsable;
use DateTime;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
  /**
   * Display register page.
   * 
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    return view('start');
  }

  /**
   * Handle account registration request
   * 
   * @param RegisterRequest $request
   * 
   * @return \Illuminate\Http\Response
   */
  public function register(RegisterRequest $request)
  {
    Log::info('RequestController.register');
    Log::info($request->validated());
    $user = User::create($request->validated());
    Log::info($user);
    $responsable = new Responsable();
    $responsable->correo = $user->correo;
    $responsable->cedula = '1020';
    $responsable->nombre = $user->nombre;
    $responsable->nacimiento = new DateTime();
    $responsable->user_id = $user->id;
    Log::info($responsable);
    $responsable->save();
    Log::info($responsable);
    auth()->login($user);

    return redirect('/')->with('success', "Account successfully registered.");
  }
}
