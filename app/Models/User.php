<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Model implements AuthenticatableContract
{
	protected $table = 'veterinaria.user';
  use Authenticatable;
	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'api_token'
	];

	protected $fillable = [
		'nombre',
		'correo',
		'email_verified_at',
		'api_token'
	];
}
