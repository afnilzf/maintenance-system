<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spareParts = [
            [
                'name' => 'Baut M10x30mm',
                'specification' => 'Stainless Steel A2',
                'stock' => rand(100, 1000),
                'unit' => 'pcs',
                'supplier' => 'PT. Logam Jaya',
            ],
            [
                'name' => 'Mur M10',
                'specification' => 'Stainless Steel A2',
                'stock' => rand(100, 1000),
                'unit' => 'pcs',
                'supplier' => 'PT. Logam Jaya',
            ],
            [
                'name' => 'Oli Gear Box ISO VG 68',
                'specification' => 'Pelumas Sintetik',
                'stock' => rand(20, 200),
                'unit' => 'liter',
                'supplier' => 'CV. Oli Mandiri',
            ],
            [
                'name' => 'Seal Oli Karet',
                'specification' => 'Ukuran 25x40x8',
                'stock' => rand(10, 100),
                'unit' => 'pcs',
                'supplier' => 'Supplier Segel',
            ],
            [
                'name' => 'Filter Oli Hidrolik',
                'specification' => 'Elemen Filter 10 Micron',
                'stock' => rand(5, 50),
                'unit' => 'pcs',
                'supplier' => 'PT. Filtrasi Utama',
            ],
            [
                'name' => 'Bearing Roda',
                'specification' => 'Tipe 6205 ZZ',
                'stock' => rand(8, 80),
                'unit' => 'pcs',
                'supplier' => 'CV. Beringin',
            ],
            [
                'name' => 'V-Belt A-100',
                'specification' => 'Panjang 1000mm',
                'stock' => rand(15, 150),
                'unit' => 'pcs',
                'supplier' => 'Toko Belt Sejati',
            ],
            [
                'name' => 'Sensor Proximity Induktif',
                'specification' => 'NPN NO 8mm',
                'stock' => rand(3, 30),
                'unit' => 'pcs',
                'supplier' => 'PT. Sensor Elektronik',
            ],
            [
                'name' => 'Bohlam Indikator 220V',
                'specification' => 'Warna Merah',
                'stock' => rand(20, 200),
                'unit' => 'pcs',
                'supplier' => 'Toko Lampu Hemat',
            ],
            [
                'name' => 'Solenoid Valve',
                'specification' => '24V DC, 1/4 inch',
                'stock' => rand(2, 20),
                'unit' => 'pcs',
                'supplier' => 'CV. Pneumatik',
            ],
        ];

        foreach ($spareParts as $part) {
            DB::table('spareparts')->insert([
                'name' => $part['name'],
                'specification' => $part['specification'],
                'stock' => $part['stock'],
                'unit' => $part['unit'],
                'supplier' => $part['supplier'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
