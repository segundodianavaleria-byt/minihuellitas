<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'unique_id',
        'user_id',
        'mascota_id',
        'servicio_id',
        'fecha',
        'hora',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}