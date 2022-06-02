<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableMascota extends Model
{
	protected $table = 'veterinaria.responsable_mascota';
  use HasFactory;
	protected $fillable = [
		'responsable_id',
		'mascota_id'
	];
}
