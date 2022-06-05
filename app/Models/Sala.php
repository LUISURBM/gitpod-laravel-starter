<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table = 'veterinaria.sala';
    protected $fillable = [
      'nombre',
      'cantidad_camilla',
      'cantidad_baños',
      'ultima_limpieza',
    ];
}
