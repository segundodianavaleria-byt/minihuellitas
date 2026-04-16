<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'precio',
        'duracion_minutos',
        'icono',
        'imagen',
        'activo',
        'es_paquete',
        'servicios_incluidos'
    ];
    
    protected $casts = [
        'precio' => 'decimal:2',
        'activo' => 'boolean',
        'es_paquete' => 'boolean',
        'servicios_incluidos' => 'array'
    ];
    
    // Método para obtener servicios por categoría
    public static function getByCategoria($categoria)
    {
        return self::where('categoria', $categoria)
                   ->where('activo', true)
                   ->where('es_paquete', false)
                   ->get();
    }
    
    // Método para obtener todos los paquetes
    public static function getPaquetes()
    {
        return self::where('es_paquete', true)
                   ->where('activo', true)
                   ->get();
    }
}