<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SparepartRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sparePartIds = DB::table('spareparts')->pluck('id')->toArray();
        $plpUserIds = DB::table('users')->where('role', 'plp')->pluck('id')->toArray();

        if (empty($sparePartIds)) {
            $this->command->warn('Tidak ada sparepart yang ditemukan. Harap jalankan SparepartSeeder terlebih dahulu.');
            return;
        }

        if (empty($plpUserIds)) {
            $this->command->warn('Tidak ada pengguna PLP yang ditemukan. Harap jalankan UserSeeder terlebih dahulu.');
            return;
        }

        $statuses = ['pending', 'approved', 'rejected'];
        $descriptions = [
            'Diperlukan untuk penggantian rutin pada mesin A.',
            'Permintaan untuk perbaikan mendesak karena kerusakan.',
            'Tambahan stok untuk kebutuhan bulanan.',
            'Untuk proyek pengembangan baru.',
            'Komponen rusak, butuh penggantian segera.',
            'Persiapan untuk jadwal perawatan besar.',
        ];

        // Buat 20-50 permintaan acak
        $numberOfRequests = rand(20, 50);

        for ($i = 0; $i < $numberOfRequests; $i++) {
            $randomSparePartId = $sparePartIds[array_rand($sparePartIds)];
            $quantity = rand(1, 20); // Kuantitas permintaan acak
            $randomDescription = $descriptions[array_rand($descriptions)];
            $randomPlpUserId = $plpUserIds[array_rand($plpUserIds)];
            $randomStatus = $statuses[array_rand($statuses)];
            $requestedAt = Carbon::now()->subDays(rand(1, 180)); // Tanggal permintaan dalam 6 bulan terakhir

            DB::table('sparepart_requests')->insert([
                'sparepart_id' => $randomSparePartId,
                'quantity' => $quantity,
                'description' => $randomDescription,
                'requested_by' => $randomPlpUserId,
                'status' => $randomStatus,
                'created_at' => $requestedAt,
                'updated_at' => $requestedAt,
            ]);
        }
    }
}
