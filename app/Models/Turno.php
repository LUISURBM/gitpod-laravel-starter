<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;
    protected $table = 'veterinaria.turno';
    protected $fillable = [
      'fecha',
      'profesional_id',
      'mascota_id',
      'servicio_id',
    ];
}
