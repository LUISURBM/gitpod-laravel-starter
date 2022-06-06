<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaMascota extends Model
{
    use HasFactory;
    protected $table = 'veterinaria.visita_mascota';
    protected $fillable = [
      'peso',
      'altura',
      'satisfaccion',
      'mascota_id',
      'turno_id',
      'factura_id'
    ];
}
