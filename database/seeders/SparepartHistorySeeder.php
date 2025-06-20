<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SparepartHistorySeeder extends Seeder
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

        $types = ['in', 'out'];
        $notes = [
            'Pembelian baru dari supplier.',
            'Penggunaan untuk perawatan rutin.',
            'Penggantian komponen yang rusak.',
            'Penerimaan barang dari pengadaan.',
            'Pengeluaran untuk perbaikan mendesak.',
            'Stok masuk dari retur barang.',
            'Pengambilan untuk proyek khusus.',
        ];

        // Buat 100-200 catatan histori acak
        $numberOfHistories = rand(100, 200);

        for ($i = 0; $i < $numberOfHistories; $i++) {
            $randomSparePartId = $sparePartIds[array_rand($sparePartIds)];
            $randomType = $types[array_rand($types)];
            $quantity = rand(1, 50); // Kuantitas acak
            $usedAt = Carbon::now()->subDays(rand(1, 365)); // Tanggal dalam setahun terakhir
            $note = $notes[array_rand($notes)];
            $randomPlpUserId = $plpUserIds[array_rand($plpUserIds)];
            $supplier = ($randomType === 'in') ? 'Supplier ' . rand(1, 5) : null; // Supplier hanya untuk type 'in'

            DB::table('sparepart_histories')->insert([
                'sparepart_id' => $randomSparePartId,
                'type' => $randomType,
                'quantity' => $quantity,
                'unit' => DB::table('spareparts')->where('id', $randomSparePartId)->value('unit'), // Ambil unit dari spareparts
                'supplier' => $supplier,
                'note' => $note,
                'requested_by' => $randomPlpUserId,
                'created_at' => $usedAt, // Gunakan usedAt sebagai created_at agar terlihat histori
                'updated_at' => $usedAt,
            ]);

            // Update stok sparepart jika 'type' adalah 'in' atau 'out'
            $sparepart = DB::table('spareparts')->find($randomSparePartId);
            if ($sparepart) {
                if ($randomType === 'in') {
                    DB::table('spareparts')->where('id', $randomSparePartId)->increment('stock', $quantity);
                } else {
                    // Pastikan stok tidak menjadi negatif
                    if ($sparepart->stock >= $quantity) {
                        DB::table('spareparts')->where('id', $randomSparePartId)->decrement('stock', $quantity);
                    } else {
                        // Jika stok tidak cukup, kurangi sesuai stok yang ada
                        DB::table('spareparts')->where('id', $randomSparePartId)->decrement('stock', $sparepart->stock);
                    }
                }
            }
        }
    }
}
