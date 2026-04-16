<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class NuevasCategoriasSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== SERVICIOS DE URGENCIAS ====================
        $urgencias = [
            [
                'nombre' => 'Atención de Emergencia',
                'categoria' => 'urgencia',
                'descripcion' => 'Atención inmediata para casos de emergencia: intoxicaciones, accidentes, convulsiones.',
                'precio' => 500,
                'duracion_minutos' => 60,
                'icono' => 'ambulance',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Curaciones y Heridas',
                'categoria' => 'urgencia',
                'descripcion' => 'Limpieza y curación de heridas, cortaduras o lesiones menores.',
                'precio' => 350,
                'duracion_minutos' => 40,
                'icono' => 'band-aid',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Intoxicaciones',
                'categoria' => 'urgencia',
                'descripcion' => 'Tratamiento inmediato para intoxicaciones por alimentos o sustancias tóxicas.',
                'precio' => 600,
                'duracion_minutos' => 90,
                'icono' => 'skull',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // ==================== SERVICIOS DE ENTRENAMIENTO ====================
        $entrenamiento = [
            [
                'nombre' => 'Entrenamiento Básico',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Enseñanza de comandos básicos: sentado, quieto, venir, caminar con correa.',
                'precio' => 400,
                'duracion_minutos' => 60,
                'icono' => 'dog',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Modificación de Conducta',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Corrección de comportamientos no deseados: ladridos excesivos, agresividad, ansiedad.',
                'precio' => 550,
                'duracion_minutos' => 90,
                'icono' => 'brain',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Socialización',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Clases para mejorar la interacción con otros perros y personas.',
                'precio' => 350,
                'duracion_minutos' => 50,
                'icono' => 'users',
                'activo' => true,
                'es_paquete' => false,
            ],
            [
                'nombre' => 'Agility (Obediencia Avanzada)',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Entrenamiento deportivo para desarrollar habilidades físicas y mentales.',
                'precio' => 450,
                'duracion_minutos' => 60,
                'icono' => 'running',
                'activo' => true,
                'es_paquete' => false,
            ],
        ];
        
        // Insertar servicios de urgencias
        foreach($urgencias as $servicio) {
            Servicio::create($servicio);
        }
        
        // Insertar servicios de entrenamiento
        foreach($entrenamiento as $servicio) {
            Servicio::create($servicio);
        }
    }
}