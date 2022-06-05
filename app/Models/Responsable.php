<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    protected $table = 'veterinaria.responsable';
  
    protected $fillable = [
      'nombre',
      'correo',
      'nacimiento',
      'user_id'
    ];
}
