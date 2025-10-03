<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipments = [
            [
                'name' => 'Envío Estándar Nacional',
                'price' => 15.00,
            ],
            [
                'name' => 'Envío Express (24h)',
                'price' => 35.00,
            ],
            [
                'name' => 'Recojo en Tienda / Almacén',
                'price' => 0.00, // Cero costo
            ],
            [
                'name' => 'Envío Gratis (Promoción)',
                'price' => 0.00, // Cero costo
            ],
            [
                'name' => 'Envío Internacional Estándar',
                'price' => 65.00,
            ],
            [
                'name' => 'Envío de Regalo',
                'price' => 10.00,
            ],
        ];

        foreach($shipments as $shipment){
            Shipment::create($shipment);
        }
    }
}
