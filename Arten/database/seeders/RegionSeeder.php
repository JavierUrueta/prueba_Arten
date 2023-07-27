<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Región Noreste',
            'Región Occidente',
            'Región Oriente',
            'Región Centronorte',
            'Región Centrosur',
            'Región Suroeste',
            'Región Sureste',
        ];

        foreach ($regions as $region) {
            Region::create(['nombre' => $region]);
        }
    }
}
