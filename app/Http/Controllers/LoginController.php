<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  /**
   * Display login page.
   * 
   * @return Renderable
   */
  public function show()
  {
    Log::info('Login An informational message. show');
    return view('welcome');
  }

  /**
   * Handle account login request
   * 
   * @param LoginRequest $request
   * 
   * @return \Illuminate\Http\Response
   */
  public function login(LoginRequest $request)
  {
    $credentials = implode(',', $request->getCredentials());
    Log::info($credentials);
    $users = DB::table('veterinaria.responsable')->where('correo', '=', $credentials)->select('correo')->take(1)->get();
    Log::info($users);

    if (1 > count($users)) :
      Log::info('Login An informational message. invalid');
      return redirect()->to('login')
        ->withErrors(trans('auth.failed'));
    endif;
    Log::info('Login An informational message. valid ');
    Log::info($request->getCredentials());

    $user = Auth::getProvider()->retrieveByCredentials($request->getCredentials());
    Log::info($user);

    Auth::login($user);
    Log::info($user);

    return $this->authenticated($request, $user);
  }

  /**
   * Handle response after user authenticated
   * 
   * @param Request $request
   * @param Auth $user
   * 
   * @return \Illuminate\Http\Response
   */
  protected function authenticated(Request $request, $user)
  {
    Log::info('Login An informational message. authenticated');
    return redirect()->intended();
  }
}
