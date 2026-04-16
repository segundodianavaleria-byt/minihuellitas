<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductosCompletosSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Eliminar productos existentes
        Producto::query()->delete();
        
        // ==================== ALIMENTOS ====================
        $alimentos = [
            [
                'nombre' => 'Royal Canin Adulto',
                'categoria' => 'alimento',
                'descripcion' => 'Alimento balanceado para perros adultos de todas las razas. Contiene proteínas de alta calidad.',
                'especificaciones' => 'Presentación: 3kg, 7.5kg, 15kg | Proteína: 25% | Grasa: 14%',
                'precio' => 450,
                'precio_original' => null,
                'stock' => 25,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Purina Pro Plan',
                'categoria' => 'alimento',
                'descripcion' => 'Nutrición avanzada para perros con ingredientes de alta calidad. Ideal para razas medianas.',
                'especificaciones' => 'Presentación: 2.5kg, 8kg | Proteína: 28% | Grasa: 16%',
                'precio' => 520,
                'precio_original' => null,
                'stock' => 18,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => "Hill's Science Diet",
                'categoria' => 'alimento',
                'descripcion' => 'Alimento premium para perros con ingredientes naturales. Ayuda a la salud digestiva.',
                'especificaciones' => 'Presentación: 3kg, 7kg | Proteína: 22% | Fibra: 4%',
                'precio' => 580,
                'precio_original' => null,
                'stock' => 15,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Eukanuba Adulto',
                'categoria' => 'alimento',
                'descripcion' => 'Alimento con tecnología avanzada para un desarrollo óptimo. Rico en Omega 3 y 6.',
                'especificaciones' => 'Presentación: 3kg, 12kg | Proteína: 26% | Grasa: 15%',
                'precio' => 490,
                'precio_original' => null,
                'stock' => 22,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Pedigree Adulto',
                'categoria' => 'alimento',
                'descripcion' => 'Alimento completo para perros adultos. Con vitaminas y minerales esenciales.',
                'especificaciones' => 'Presentación: 2.5kg, 8kg, 15kg | Proteína: 21% | Grasa: 10%',
                'precio' => 350,
                'precio_original' => null,
                'stock' => 40,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 15,
            ],
            [
                'nombre' => 'Diamond Naturals',
                'categoria' => 'alimento',
                'descripcion' => 'Alimento natural con ingredientes de alta calidad. Sin maíz ni trigo.',
                'especificaciones' => 'Presentación: 6.8kg, 13.6kg | Proteína: 26% | Grasa: 14%',
                'precio' => 680,
                'precio_original' => null,
                'stock' => 12,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
        ];
        
        // ==================== PRODUCTOS DE ASEO ====================
        $aseo = [
            [
                'nombre' => 'FURminator Deslanador',
                'categoria' => 'aseo',
                'descripcion' => 'Cepillo profesional que elimina hasta el 90% del pelo muerto. Reduce la muda hasta un 90%.',
                'especificaciones' => 'Talla: Mediana/Grande | Para pelo largo y corto | Incluye cepillo de limpieza',
                'precio' => 420,
                'precio_original' => 520,
                'stock' => 15,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 19,
            ],
            [
                'nombre' => 'Shampoo Hipoalergénico',
                'categoria' => 'aseo',
                'descripcion' => 'Shampoo suave para pieles sensibles. Sin parabenos ni sulfatos.',
                'especificaciones' => 'Presentación: 500ml | pH balanceado | Aroma suave a manzanilla',
                'precio' => 180,
                'precio_original' => null,
                'stock' => 35,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Acondicionador Hidratante',
                'categoria' => 'aseo',
                'descripcion' => 'Acondicionador que deja el pelaje suave y brillante. Con aceite de coco y aloe vera.',
                'especificaciones' => 'Presentación: 500ml | Para todo tipo de pelaje | Enjuague fácil',
                'precio' => 165,
                'precio_original' => null,
                'stock' => 28,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Cepillo de Cerdas Naturales',
                'categoria' => 'aseo',
                'descripcion' => 'Cepillo suave con cerdas naturales. Ideal para cepillado diario.',
                'especificaciones' => 'Talla: Única | Cerdas de jabalí | Mango ergonómico',
                'precio' => 145,
                'precio_original' => null,
                'stock' => 42,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Shampoo Antipulgas',
                'categoria' => 'aseo',
                'descripcion' => 'Shampoo con fórmula natural que elimina pulgas y garrapatas. Previene reinfestaciones.',
                'especificaciones' => 'Presentación: 350ml | Efecto prolongado | Ingredientes naturales',
                'precio' => 210,
                'precio_original' => 260,
                'stock' => 20,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 19,
            ],
        ];
        
        // ==================== JUGUETES ====================
        $juguetes = [
            [
                'nombre' => 'KONG Clásico',
                'categoria' => 'juguete',
                'descripcion' => 'Juguete de goma natural para perros. Ideal para rellenar con premios.',
                'especificaciones' => 'Tallas: S, M, L | Goma natural resistente | Apto para dispensar comida',
                'precio' => 185,
                'precio_original' => null,
                'stock' => 30,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Nylabone DuraChew',
                'categoria' => 'juguete',
                'descripcion' => 'Hueso para morder que dura más. Ayuda a limpiar dientes y masajear encías.',
                'especificaciones' => 'Talla: Mediana | Sabor a pollo | Resistente para masticadores moderados',
                'precio' => 95,
                'precio_original' => null,
                'stock' => 45,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Pelota Chuckit!',
                'categoria' => 'juguete',
                'descripcion' => 'Pelota de goma natural con alta visibilidad. Flota en agua.',
                'especificaciones' => 'Tamaño: Estándar | Color: Naranja/Azul | Apto para lanzadores',
                'precio' => 75,
                'precio_original' => 95,
                'stock' => 60,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 21,
            ],
            [
                'nombre' => 'Cuerda de Juego',
                'categoria' => 'juguete',
                'descripcion' => 'Cuerda de algodón resistente para juegos de tira y afloja. Ayuda a limpiar dientes.',
                'especificaciones' => 'Largo: 50cm | Algodón natural | Nudos reforzados',
                'precio' => 55,
                'precio_original' => null,
                'stock' => 38,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Juguete Squeaky',
                'categoria' => 'juguete',
                'descripcion' => 'Juguete de peluche con sonido. Ideal para perros pequeños.',
                'especificaciones' => 'Talla: Pequeña | Sonido incorporado | Material suave',
                'precio' => 65,
                'precio_original' => null,
                'stock' => 50,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 15,
            ],
        ];
        
        // ==================== ACCESORIOS ====================
        $accesorios = [
            [
                'nombre' => 'Collar Antipulgas Frontline',
                'categoria' => 'accesorio',
                'descripcion' => 'Collar repelente de pulgas y garrapatas. Protección por 8 meses.',
                'especificaciones' => 'Talla: Única | Ajustable | Resistente al agua',
                'precio' => 320,
                'precio_original' => null,
                'stock' => 25,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Cama Ortopédica',
                'categoria' => 'accesorio',
                'descripcion' => 'Cama con memory foam para aliviar dolores articulares. Ideal para perros mayores.',
                'especificaciones' => 'Tallas: 60x45cm, 80x60cm | Funda removible | Base antideslizante',
                'precio' => 650,
                'precio_original' => 780,
                'stock' => 12,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 17,
            ],
            [
                'nombre' => 'Collar Reflectante',
                'categoria' => 'accesorio',
                'descripcion' => 'Collar con material reflectante para paseos nocturnos. Ajustable y resistente.',
                'especificaciones' => 'Tallas: S, M, L | Material: Nylon | Cierre de seguridad',
                'precio' => 85,
                'precio_original' => null,
                'stock' => 55,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Cepillo Dental Kit',
                'categoria' => 'accesorio',
                'descripcion' => 'Kit completo para higiene dental: cepillo y pasta dental sabor a pollo.',
                'especificaciones' => 'Incluye: Cepillo de 2 cabezas + Pasta 70g | Sabor a pollo',
                'precio' => 125,
                'precio_original' => null,
                'stock' => 32,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Cargador para Viaje',
                'categoria' => 'accesorio',
                'descripcion' => 'Transportador plegable para viajes. Ventilación adecuada y fácil de limpiar.',
                'especificaciones' => 'Tallas: Pequeño, Mediano | Plegable | Material resistente',
                'precio' => 380,
                'precio_original' => 450,
                'stock' => 18,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 16,
            ],
        ];
        
        // ==================== SNACKS Y PREMIOS ====================
        $snacks = [
            [
                'nombre' => 'Snacks Naturales',
                'categoria' => 'snack',
                'descripcion' => 'Snacks 100% naturales sin conservantes ni colorantes. Premios saludables.',
                'especificaciones' => 'Presentación: 200g | Sabores: Pollo, Res, Cordero | Sin granos',
                'precio' => 85,
                'precio_original' => null,
                'stock' => 85,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Huesos Dentales',
                'categoria' => 'snack',
                'descripcion' => 'Huesos que ayudan a limpiar los dientes y refrescar el aliento.',
                'especificaciones' => 'Presentación: 6 unidades | Sabor a menta | Textura crujiente',
                'precio' => 95,
                'precio_original' => null,
                'stock' => 60,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 10,
            ],
            [
                'nombre' => 'Galletas de Entrenamiento',
                'categoria' => 'snack',
                'descripcion' => 'Galletas pequeñas ideales para entrenamiento. Bajas en calorías.',
                'especificaciones' => 'Presentación: 150g | Sabor a hígado | Forma de estrella',
                'precio' => 55,
                'precio_original' => null,
                'stock' => 95,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => false,
                'descuento_porcentaje' => null,
            ],
            [
                'nombre' => 'Palitos de Pollo',
                'categoria' => 'snack',
                'descripcion' => 'Palitos 100% de pechuga de pollo. Alto en proteínas.',
                'especificaciones' => 'Presentación: 100g | 100% natural | Sin conservantes',
                'precio' => 75,
                'precio_original' => 95,
                'stock' => 45,
                'imagen' => null,
                'disponible_online' => true,
                'en_oferta' => true,
                'descuento_porcentaje' => 21,
            ],
        ];
        
        // Insertar todos los productos
        foreach(array_merge($alimentos, $aseo, $juguetes, $accesorios, $snacks) as $producto) {
            Producto::create($producto);
        }
        
        // Reactivar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        $this->command->info('✅ Productos completos insertados:');
        $this->command->info('   - Alimentos: ' . count($alimentos));
        $this->command->info('   - Productos de Aseo: ' . count($aseo));
        $this->command->info('   - Juguetes: ' . count($juguetes));
        $this->command->info('   - Accesorios: ' . count($accesorios));
        $this->command->info('   - Snacks y Premios: ' . count($snacks));
        $this->command->info('   Total: ' . (count($alimentos) + count($aseo) + count($juguetes) + count($accesorios) + count($snacks)));
    }
}