<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nombre',
        'especie',
        'raza',
        'edad',
        'sexo',
        'peso',
        'fecha_nacimiento',
        'color',
        'observaciones_medicas',
        'foto'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}