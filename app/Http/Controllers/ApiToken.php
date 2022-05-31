<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiToken extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }/**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(60);
 
        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
 
        return ['token' => $token];
    }
}
