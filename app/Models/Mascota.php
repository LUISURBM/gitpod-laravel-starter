<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascota
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Mascota extends Model
{
	protected $table = 'veterinaria.mascota';
	protected $fillable = [
		'nacimiento',
    'adquisicion',
    'nombre',
    'codigo',
    'color',
    'obervaciones',
    'esterilizado',
    'raza_id',
    'genero_id',
    'especie_id'
	];
}
