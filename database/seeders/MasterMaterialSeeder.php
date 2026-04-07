<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterMaterial;

class MasterMaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            ['name' => 'Keramik Lantai 40x40', 'unit' => 'Dus'],
            ['name' => 'Keramik Lantai 60x60', 'unit' => 'Dus'],
            ['name' => 'Keramik Dinding 25x40', 'unit' => 'Dus'],
            ['name' => 'Semen Portland (PC)', 'unit' => 'Sak 50kg'],
            ['name' => 'Bata Merah', 'unit' => 'Pcs'],
            ['name' => 'Batako', 'unit' => 'Pcs'],
            ['name' => 'Cat Tembok Interior', 'unit' => 'Pail 25kg'],
            ['name' => 'Cat Tembok Eksterior', 'unit' => 'Pail 25kg'],
            ['name' => 'Besi Beton Polos 8mm', 'unit' => 'Batang'],
            ['name' => 'Baja Ringan Kanal C', 'unit' => 'Batang'],
            ['name' => 'Pintu Kayu Jati', 'unit' => 'Unit'],
            ['name' => 'Kloset Duduk', 'unit' => 'Unit'],
        ];

        foreach ($materials as $material) {
            MasterMaterial::create($material);
        }
    }
}