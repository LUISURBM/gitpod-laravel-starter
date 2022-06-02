<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    Log::info('Login An informational message. authorize');
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'correo' => 'required'
    ];
  }
  /**
   * Get the needed authorization credentials from the request.
   *
   * @return array
   * @throws \Illuminate\Contracts\Container\BindingResolutionException
   */
  public function getCredentials()
  {
    Log::info('Login An informational message. getCredentials');
    // The form field for providing correo or password
    // have name of "correo", however, in order to support
    // logging users in with both (correo and correo)
    // we have to check if user has entered one or another
    $correo = $this->get('correo');

    if ($this->isEmail($correo)) {
      return [
        'correo' => $correo
      ];
    }

    return $this->only('correo');
  }

      /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }
}
