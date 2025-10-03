<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // --- 1. PRODUCTOS TERMINADOS ---
            [
                'name' => 'Computadoras de Escritorio',
                'description' => 'Equipos completos listos para usar en oficina, hogar o gaming.',
            ],
            [
                'name' => 'Laptops y Portátiles',
                'description' => 'Computadoras móviles de diferentes gamas, incluyendo ultrabooks y equipos profesionales.',
            ],
            [
                'name' => 'Servidores y Workstations',
                'description' => 'Equipos de alto rendimiento y fiabilidad para entornos empresariales o tareas de rendering.',
            ],
            [
                'name' => 'Monitores y Pantallas',
                'description' => 'Dispositivos de visualización de diferentes tecnologías (LED, OLED, Curvos, Gaming).',
            ],

            // --- 2. COMPONENTES Y HARDWARE ---
            [
                'name' => 'Procesadores (CPU)',
                'description' => 'Unidades Centrales de Procesamiento, el núcleo principal de la computadora.',
            ],
            [
                'name' => 'Placas Base (Motherboards)',
                'description' => 'Placas principales que interconectan y permiten la comunicación de todos los componentes del sistema.',
            ],
            [
                'name' => 'Memoria RAM',
                'description' => 'Módulos de memoria volátil para el acceso y ejecución rápida de programas y datos.',
            ],
            [
                'name' => 'Tarjetas Gráficas (GPU)',
                'description' => 'Tarjetas de video dedicadas para gaming de alta resolución, diseño 3D y minería.',
            ],
            [
                'name' => 'Almacenamiento (SSD/HDD)',
                'description' => 'Unidades de estado sólido (SSD) y discos duros (HDD) para la persistencia de datos.',
            ],
            [
                'name' => 'Fuentes de Poder (PSU)',
                'description' => 'Dispositivos encargados de suministrar energía eléctrica de manera estable y segura a los componentes.',
            ],
            [
                'name' => 'Gabinetes y Chasis',
                'description' => 'Estructuras externas que contienen, organizan y protegen el hardware interno de la PC.',
            ],
            [
                'name' => 'Refrigeración',
                'description' => 'Ventiladores, disipadores y kits de refrigeración líquida para controlar la temperatura del sistema.',
            ],

            // --- 3. PERIFÉRICOS Y ACCESORIOS ---
            [
                'name' => 'Teclados y Mouses',
                'description' => 'Dispositivos de entrada esenciales para la interacción del usuario.',
            ],
            [
                'name' => 'Webcams y Micrófonos',
                'description' => 'Periféricos para videoconferencia, streaming y grabación de audio.',
            ],
            [
                'name' => 'Software y Licencias',
                'description' => 'Sistemas operativos, antivirus y software de productividad.',
            ],
            [
                'name' => 'Cables y Adaptadores',
                'description' => 'Conectores, hubs USB, y adaptadores de red y video.',
            ],
        ];

        // Creamos las categorías
        foreach($categories as $categorie){
            Categorie::create($categorie);
        }
    }
}
