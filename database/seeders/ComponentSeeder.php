<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua ID mesin yang ada dalam rentang 2 sampai 18
        // Diasumsikan ID mesin ini sudah ada di tabel 'machines'
        $machineIds = DB::table('machines')->whereBetween('id', [2, 18])->pluck('id')->toArray();

        // Jika tidak ada ID mesin yang ditemukan, berikan peringatan dan hentikan
        if (empty($machineIds)) {
            $this->command->warn('Tidak ada ID mesin dalam rentang 2-18 ditemukan. Harap pastikan tabel "machines" sudah terisi.');
            return;
        }

        $componentsData = [
            // Contoh komponen berdasarkan gambar yang Anda berikan
            [
                'name' => 'Kopling dan Instrumen penggerak',
                'measurement_criteria' => 'Ukuran, bentuk',
            ],
            [
                'name' => 'Gear Box Mesin',
                'measurement_criteria' => 'Bentuk, Dimensi',
            ],
            [
                'name' => 'Oli Gear Box Mesin',
                'measurement_criteria' => 'Kekentalan, ketinggian',
            ],
            [
                'name' => 'Oli Gear Box Eretan Meja',
                'measurement_criteria' => 'Kekentalan, ketinggian',
            ],
            [
                'name' => 'Motor Pemutar Mesin',
                'measurement_criteria' => 'Putaran',
            ],
            [
                'name' => 'Eretan Mesin',
                'measurement_criteria' => 'Kondisi',
            ],
            [
                'name' => 'Poros Transportir',
                'measurement_criteria' => 'Dimensi, Kondisi',
            ],
            // Contoh komponen umum lainnya:
            [
                'name' => 'Sistem Pendingin',
                'measurement_criteria' => 'Level cairan, kebocoran',
            ],
            [
                'name' => 'Filter Udara',
                'measurement_criteria' => 'Kotoran, sumbatan',
            ],
            [
                'name' => 'Sistem Kelistrikan',
                'measurement_criteria' => 'Koneksi, isolasi kabel',
            ],
            [
                'name' => 'Bearing Spindle',
                'measurement_criteria' => 'Kebisingan, getaran, temperatur',
            ],
            [
                'name' => 'Pompa Hidrolik',
                'measurement_criteria' => 'Tekanan, kebocoran, suara',
            ],
            [
                'name' => 'Selang dan Pipa',
                'measurement_criteria' => 'Kebocoran, retak, deformasi',
            ],
            [
                'name' => 'Belt Penggerak',
                'measurement_criteria' => 'Ketegangan, retak, keausan',
            ],
            [
                'name' => 'Panel Kontrol',
                'measurement_criteria' => 'Fungsi tombol, indikator',
            ],
            [
                'name' => 'Pisau/Tool Holder',
                'measurement_criteria' => 'Ketajaman, keausan, kerusakan',
            ],
            [
                'name' => 'Sistem Pelumasan Otomatis',
                'measurement_criteria' => 'Level oli, fungsi pompa',
            ],
            [
                'name' => 'Chuck/Cekam',
                'measurement_criteria' => 'Cengkraman, keausan rahang',
            ],
        ];

        // Loop melalui setiap ID mesin yang tersedia
        foreach ($machineIds as $machineId) {
            // Tentukan jumlah komponen acak untuk mesin ini (misal: 2 hingga 5 komponen)
            $numberOfComponents = rand(2, 5);

            for ($i = 0; $i < $numberOfComponents; $i++) {
                // Pilih komponen secara acak dari daftar $componentsData
                $randomComponent = $componentsData[array_rand($componentsData)];

                DB::table('components')->insert([
                    'machine_id' => $machineId,
                    'name' => $randomComponent['name'],
                    'measurement_criteria' => $randomComponent['measurement_criteria'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
