<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;

class ServiciosCompletosSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivar verificaciones de claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Eliminar servicios existentes (en lugar de truncate)
        Servicio::query()->delete();
        
        // ==================== SERVICIOS DE CORTES (4) ====================
        $cortes = [
            [
                'nombre' => 'Corte de Pelo Estándar',
                'categoria' => 'corte',
                'descripcion' => 'Corte profesional según la raza de tu mascota. Incluye peinado, acabado perfecto y perfume suave.',
                'precio' => 350,
                'duracion_minutos' => 60,
                'icono' => 'scissors',
                'imagen' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Corte de Pelo Premium',
                'categoria' => 'corte',
                'descripcion' => 'Corte con diseño personalizado, peinado especial, acabado con brillo y perfume exclusivo francés.',
                'precio' => 550,
                'duracion_minutos' => 90,
                'icono' => 'cut',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Corte Higiénico',
                'categoria' => 'corte',
                'descripcion' => 'Corte en áreas sensibles (patas, zona genital, anal) para mantener la higiene y comodidad de tu mascota.',
                'precio' => 280,
                'duracion_minutos' => 40,
                'icono' => 'hand-sparkles',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Corte de Uñas',
                'categoria' => 'corte',
                'descripcion' => 'Corte y limado profesional de uñas. Incluye revisión de almohadillas y aplicación de crema hidratante.',
                'precio' => 150,
                'duracion_minutos' => 20,
                'icono' => 'cut',
                'imagen' => 'https://images.unsplash.com/photo-1519058082700-08a0b56da9b4?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== SERVICIOS DE BAÑO (5) ====================
        $banos = [
            [
                'nombre' => 'Baño Completo',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo especializado según tipo de piel, secado profesional, perfume y cepillado.',
                'precio' => 300,
                'duracion_minutos' => 45,
                'icono' => 'bath',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Baño Medicado',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo medicado para pieles sensibles, alergias, dermatitis o problemas dermatológicos.',
                'precio' => 400,
                'duracion_minutos' => 50,
                'icono' => 'syringe',
                'imagen' => 'https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Baño Desparasitante',
                'categoria' => 'baño',
                'descripcion' => 'Baño con shampoo antipulgas y garrapatas. Elimina parásitos externos y previene reinfestaciones.',
                'precio' => 380,
                'duracion_minutos' => 50,
                'icono' => 'bug',
                'imagen' => 'https://images.unsplash.com/photo-1589923188900-85ae9058d54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Limpieza de Oídos',
                'categoria' => 'baño',
                'descripcion' => 'Limpieza profunda de oídos para prevenir infecciones, eliminar acumulación de cera y malos olores.',
                'precio' => 120,
                'duracion_minutos' => 15,
                'icono' => 'ear-deaf',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Baño de Hidromasaje',
                'categoria' => 'baño',
                'descripcion' => 'Baño relajante con jets de agua caliente que estimulan la circulación y relajan los músculos.',
                'precio' => 450,
                'duracion_minutos' => 40,
                'icono' => 'water',
                'imagen' => 'https://images.unsplash.com/photo-1548690312-e3b507d8c110?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== SERVICIOS DE SPA (4) ====================
        $spas = [
            [
                'nombre' => 'Spa Premium',
                'categoria' => 'spa',
                'descripcion' => 'Experiencia completa: hidromasaje, masajes relajantes, mascarilla hidratante, perfume exclusivo y aromaterapia.',
                'precio' => 800,
                'duracion_minutos' => 120,
                'icono' => 'spa',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Masaje Relajante',
                'categoria' => 'spa',
                'descripcion' => 'Masaje terapéutico para relajar músculos, aliviar estrés, mejorar circulación y reducir ansiedad.',
                'precio' => 250,
                'duracion_minutos' => 30,
                'icono' => 'hands',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Aromaterapia',
                'categoria' => 'spa',
                'descripcion' => 'Terapia con aceites esenciales naturales para calmar la ansiedad, mejorar el sueño y el bienestar general.',
                'precio' => 200,
                'duracion_minutos' => 25,
                'icono' => 'leaf',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Mascarilla Hidratante',
                'categoria' => 'spa',
                'descripcion' => 'Mascarilla natural hidratante para el pelaje y la piel, con ingredientes orgánicos y vitaminas.',
                'precio' => 180,
                'duracion_minutos' => 20,
                'icono' => 'mask',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== SERVICIOS DE SALUD (5) ====================
        $salud = [
            [
                'nombre' => 'Cepillado Dental',
                'categoria' => 'salud',
                'descripcion' => 'Limpieza dental profesional para prevenir sarro, caries, mal aliento y enfermedades periodontales.',
                'precio' => 200,
                'duracion_minutos' => 25,
                'icono' => 'tooth',
                'imagen' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Desparasitación Interna',
                'categoria' => 'salud',
                'descripcion' => 'Tratamiento completo contra parásitos internos (lombrices, giardias, tenias, etc.). Incluye medicamento.',
                'precio' => 180,
                'duracion_minutos' => 15,
                'icono' => 'capsules',
                'imagen' => 'https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Revisión Veterinaria',
                'categoria' => 'salud',
                'descripcion' => 'Revisión general por nuestro veterinario: peso, temperatura, frecuencia cardíaca, estado general.',
                'precio' => 150,
                'duracion_minutos' => 20,
                'icono' => 'stethoscope',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Vacunación',
                'categoria' => 'salud',
                'descripcion' => 'Aplicación de vacunas: antirrábica, séxtuple, influenza canina. Incluye cartilla de vacunación.',
                'precio' => 250,
                'duracion_minutos' => 20,
                'icono' => 'syringe',
                'imagen' => 'https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Control de Peso',
                'categoria' => 'salud',
                'descripcion' => 'Evaluación nutricional, plan de alimentación personalizado y seguimiento de peso.',
                'precio' => 120,
                'duracion_minutos' => 30,
                'icono' => 'weight-scale',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== SERVICIOS DE URGENCIAS (4) ====================
        $urgencias = [
            [
                'nombre' => 'Atención de Emergencia 24/7',
                'categoria' => 'urgencia',
                'descripcion' => 'Atención inmediata para casos de emergencia: intoxicaciones, accidentes, convulsiones, dificultad respiratoria.',
                'precio' => 500,
                'duracion_minutos' => 60,
                'icono' => 'ambulance',
                'imagen' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Curaciones y Heridas',
                'categoria' => 'urgencia',
                'descripcion' => 'Limpieza, desinfección y curación de heridas, cortaduras, mordeduras o lesiones menores.',
                'precio' => 350,
                'duracion_minutos' => 40,
                'icono' => 'band-aid',
                'imagen' => 'https://images.unsplash.com/photo-1588943211346-0908a1fb0b01?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Intoxicaciones',
                'categoria' => 'urgencia',
                'descripcion' => 'Tratamiento inmediato para intoxicaciones por alimentos, medicamentos o sustancias tóxicas.',
                'precio' => 600,
                'duracion_minutos' => 90,
                'icono' => 'skull',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Fracturas y Traumatismos',
                'categoria' => 'urgencia',
                'descripcion' => 'Atención inmediata para fracturas, esguinces y traumatismos. Inmovilización y primeros auxilios.',
                'precio' => 700,
                'duracion_minutos' => 90,
                'icono' => 'bone',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== SERVICIOS DE ENTRENAMIENTO (5) ====================
        $entrenamiento = [
            [
                'nombre' => 'Entrenamiento Básico',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Enseñanza de comandos básicos: sentado, quieto, venir, caminar con correa, no tirar.',
                'precio' => 400,
                'duracion_minutos' => 60,
                'icono' => 'dog',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Modificación de Conducta',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Corrección de comportamientos no deseados: ladridos excesivos, agresividad, ansiedad por separación.',
                'precio' => 550,
                'duracion_minutos' => 90,
                'icono' => 'brain',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Socialización Canina',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Clases grupales para mejorar la interacción con otros perros, personas y entornos nuevos.',
                'precio' => 350,
                'duracion_minutos' => 50,
                'icono' => 'users',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Agility y Obediencia',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Entrenamiento deportivo con obstáculos para desarrollar habilidades físicas y mentales.',
                'precio' => 450,
                'duracion_minutos' => 60,
                'icono' => 'running',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
            [
                'nombre' => 'Entrenamiento para Cachorros',
                'categoria' => 'entrenamiento',
                'descripcion' => 'Clases especiales para cachorros: socialización temprana, control de esfínteres, mordidas.',
                'precio' => 380,
                'duracion_minutos' => 45,
                'icono' => 'baby-carriage',
                'imagen' => 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => false,
                'servicios_incluidos' => null,
            ],
        ];
        
        // ==================== PAQUETES ESPECIALES (5) ====================
        $paquetes = [
            [
                'nombre' => 'Paquetón Mimos',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Completo + Corte de Pelo Estándar + Corte de Uñas + Cepillado Dental',
                'precio' => 800,
                'duracion_minutos' => 120,
                'icono' => 'gift',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => json_encode(['Baño Completo', 'Corte de Pelo Estándar', 'Corte de Uñas', 'Cepillado Dental']),
            ],
            [
                'nombre' => 'Spa de Lujo',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Spa Premium + Masaje Relajante + Aromaterapia + Mascarilla Hidratante',
                'precio' => 1100,
                'duracion_minutos' => 150,
                'icono' => 'crown',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => json_encode(['Spa Premium', 'Masaje Relajante', 'Aromaterapia', 'Mascarilla Hidratante']),
            ],
            [
                'nombre' => 'Salud y Bienestar',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Medicado + Cepillado Dental + Desparasitación Interna + Revisión Veterinaria',
                'precio' => 850,
                'duracion_minutos' => 100,
                'icono' => 'heartbeat',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => json_encode(['Baño Medicado', 'Cepillado Dental', 'Desparasitación Interna', 'Revisión Veterinaria']),
            ],
            [
                'nombre' => 'Pack Estética Completa',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Baño Completo + Corte de Pelo Premium + Corte de Uñas + Limpieza de Oídos',
                'precio' => 950,
                'duracion_minutos' => 130,
                'icono' => 'star',
                'imagen' => 'https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => json_encode(['Baño Completo', 'Corte de Pelo Premium', 'Corte de Uñas', 'Limpieza de Oídos']),
            ],
            [
                'nombre' => 'Entrenamiento VIP',
                'categoria' => 'paquete',
                'descripcion' => 'Incluye: Entrenamiento Básico + Modificación de Conducta + Socialización (5 sesiones)',
                'precio' => 1200,
                'duracion_minutos' => 300,
                'icono' => 'trophy',
                'imagen' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&h=300&fit=crop',
                'activo' => true,
                'es_paquete' => true,
                'servicios_incluidos' => json_encode(['Entrenamiento Básico', 'Modificación de Conducta', 'Socialización Canina']),
            ],
        ];
        
        // Insertar todos los servicios
        foreach(array_merge($cortes, $banos, $spas, $salud, $urgencias, $entrenamiento, $paquetes) as $servicio) {
            Servicio::create($servicio);
        }
        
        // Reactivar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->command->info('✅ Servicios completos insertados:');
        $this->command->info('   - Cortes: ' . count($cortes));
        $this->command->info('   - Baños: ' . count($banos));
        $this->command->info('   - Spa: ' . count($spas));
        $this->command->info('   - Salud: ' . count($salud));
        $this->command->info('   - Urgencias: ' . count($urgencias));
        $this->command->info('   - Entrenamiento: ' . count($entrenamiento));
        $this->command->info('   - Paquetes: ' . count($paquetes));
        $this->command->info('   Total: ' . (count($cortes) + count($banos) + count($spas) + count($salud) + count($urgencias) + count($entrenamiento) + count($paquetes)));
    }
}