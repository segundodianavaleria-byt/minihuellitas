<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'especificaciones',
        'precio',
        'precio_original',
        'stock',
        'imagen',
        'disponible_online',
        'en_oferta',
        'descuento_porcentaje'
    ];
    
    protected $casts = [
        'precio' => 'decimal:2',
        'precio_original' => 'decimal:2',
        'disponible_online' => 'boolean',
        'en_oferta' => 'boolean'
    ];
    
    // Método para obtener el precio con descuento
    public function getPrecioConDescuentoAttribute()
    {
        if ($this->en_oferta && $this->descuento_porcentaje) {
            return $this->precio - ($this->precio * $this->descuento_porcentaje / 100);
        }
        return $this->precio;
    }
    
    // Método para obtener el ahorro
    public function getAhorroAttribute()
    {
        if ($this->en_oferta && $this->descuento_porcentaje) {
            return $this->precio - $this->getPrecioConDescuentoAttribute();
        }
        return 0;
    }
    
    // Método para obtener productos por categoría
    public static function getByCategoria($categoria)
    {
        return self::where('categoria', $categoria)
                   ->where('disponible_online', true)
                   ->get();
    }
    
    // Método para obtener productos en oferta
    public static function getOfertas()
    {
        return self::where('en_oferta', true)
                   ->where('disponible_online', true)
                   ->get();
    }
}