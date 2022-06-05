<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'veterinaria.servicio';
    protected $fillable = [
      'fecha',
      'nombre',
      'duracion_minutos',
      'incapacidad_dias',
      'valor_total',
      'sala_id',
    ];
}
