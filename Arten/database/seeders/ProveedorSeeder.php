<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;
use App\Models\Region;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regiones = Region::pluck('id');

        foreach (range(1, 100) as $index) {
            Proveedor::create([
                'nombre' => 'Proveedor ' . $index,
                'razon_social' => 'Razón Social ' . $index,
                'numero_proveedor' => 'NPR' . $index,
                'fecha_registro' => now(),
                'RFC' => 'RFC' . $index,
                'imagen_random' => 'imagen' . $index . '.jpg',
                'id_region' => $regiones->random(),
            ]);
        }
    }
    
}
