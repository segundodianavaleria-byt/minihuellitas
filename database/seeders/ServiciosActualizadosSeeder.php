<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServiciosActualizadosSeeder extends Seeder
{
    public function run(): void
    {
        // Primero limpiar servicios existentes
        Servicio::truncate();
        
        // ==================== SERVICIOS DE CORTES ====================
        $cortes = [
            [
                'nombre' => 'Corte de Pelo Estándar',
                'categoria' => 'corte',
                'descripcion' => 'Corte profesional según la raza de tu mascota. Incluye peinado y acabado perfecto.',
                'precio' => 350,
                'duracion_minutos' => 60,
                'icono' => 'scissors',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Corte de Pelo Premium',
                'categoria' => 'corte',
                'descripcion' => 'Corte con diseño personalizado, peinado especial y acabado con perfume exclusivo.',
                'precio' => 550,
                'duracion_minutos' => 90,
                'icono' => 'cut',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Corte Higiénico',
                'categoria' => 'corte',
                'descripcion' => 'Corte en áreas sensibles (patas, zona genital, anal) para mantener la higiene de tu mascota.',
                'precio' => 280,
                'duracion_minutos' => 40,
                'icono' => 'hand-sparkles',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Corte de Uñas',
                'categoria' => 'corte',
                'descripcion' => 'Corte y limado profesional de uñas. Incluye revisión de almohadillas.',
                'precio' => 150,
                'duracion_minutos' => 20,
                'icono' => 'cut',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // ==================== SERVICIOS DE BAÑO ====================
        $banos = [
            [
                'nombre' => 'Baño Completo',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo especializado según tipo de piel, secado profesional y perfume.',
                'precio' => 300,
                'duracion_minutos' => 45,
                'icono' => 'bath',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Baño Medicado',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo medicado para pieles sensibles, alergias o problemas dermatológicos.',
                'precio' => 400,
                'duracion_minutos' => 50,
                'icono' => 'syringe',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Baño Desparasitante',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo antipulgas y garrapatas. Elimina parásitos externos.',
                'precio' => 380,
                'duracion_minutos' => 50,
                'icono' => 'bug',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Limpieza de Oídos',
                'categoria' => 'baño',
                'descripcion' => 'Limpieza profunda de oídos para prevenir infecciones y eliminar acumulación de cera.',
                'precio' => 120,
                'duracion_minutos' => 15,
                'icono' => 'ear-deaf',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // ==================== SERVICIOS DE SPA Y BIENESTAR ====================
        $spas = [
            [
                'nombre' => 'Spa Premium',
                'categoria' => 'spa',
                'descripcion' => 'Experiencia completa: hidromasaje, masajes relajantes, mascarilla hidratante y perfume exclusivo.',
                'precio' => 800,
                'duracion_minutos' => 120,
                'icono' => 'spa',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Masaje Relajante',
                'categoria' => 'spa',
                'descripcion' => 'Masaje terapéutico para relajar músculos, aliviar estrés y mejorar circulación.',
                'precio' => 250,
                'duracion_minutos' => 30,
                'icono' => 'hands',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Aromaterapia',
                'categoria' => 'spa',
                'descripcion' => 'Terapia con aceites esenciales para calmar la ansiedad y mejorar el bienestar.',
                'precio' => 200,
                'duracion_minutos' => 25,
                'icono' => 'leaf',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // ==================== SERVICIOS DE SALUD ====================
        $salud = [
            [
                'nombre' => 'Cepillado Dental',
                'categoria' => 'salud',
                'descripcion' => 'Limpieza dental profesional para prevenir sarro, caries y mal aliento.',
                'precio' => 200,
                'duracion_minutos' => 25,
                'icono' => 'tooth',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Desparasitación Interna',
                'categoria' => 'salud',
                'descripcion' => 'Tratamiento completo contra parásitos internos (lombrices, giardias, etc.).',
                'precio' => 180,
                'duracion_minutos' => 15,
                'icono' => 'capsules',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Revisión Veterinaria',
                'categoria' => 'salud',
                'descripcion' => 'Revisión general por nuestro veterinario: peso, temperatura, frecuencia cardíaca.',
                'precio' => 150,
                'duracion_minutos' => 20,
                'icono' => 'stethoscope',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // ==================== PAQUETES ESPECIALES ====================
        $paquetes = [
            [
                'nombre' => 'Paquetón Mimos',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Completo + Corte de Pelo Estándar + Corte de Uñas + Cepillado Dental',
                'precio' => 800, // Precio normal: 350+350+150+200 = 1050
                'duracion_minutos' => 120,
                'icono' => 'gift',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => ['Baño Completo', 'Corte de Pelo Estándar', 'Corte de Uñas', 'Cepillado Dental']
            ],
            [
                'nombre' => 'Spa de Lujo',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Spa Premium + Masaje Relajante + Aromaterapia',
                'precio' => 1100, // Precio normal: 800+250+200 = 1250
                'duracion_minutos' => 150,
                'icono' => 'crown',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => ['Spa Premium', 'Masaje Relajante', 'Aromaterapia']
            ],
            [
                'nombre' => 'Salud y Bienestar',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Medicado + Cepillado Dental + Desparasitación Interna + Revisión Veterinaria',
                'precio' => 850, // Precio normal: 400+200+180+150 = 930
                'duracion_minutos' => 100,
                'icono' => 'heartbeat',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => ['Baño Medicado', 'Cepillado Dental', 'Desparasitación Interna', 'Revisión Veterinaria']
            ],
            [
                'nombre' => 'Pack Estética Completa',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Completo + Corte de Pelo Premium + Corte de Uñas + Limpieza de Oídos',
                'precio' => 950, // Precio normal: 300+550+150+120 = 1120
                'duracion_minutos' => 130,
                'icono' => 'star',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => ['Baño Completo', 'Corte de Pelo Premium', 'Corte de Uñas', 'Limpieza de Oídos']
            ],
        ];
        
        // Insertar todos los servicios
        foreach(array_merge($cortes, $banos, $spas, $salud, $paquetes) as $servicio) {
            Servicio::create($servicio);
        }
    }
}