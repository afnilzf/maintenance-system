<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleMachineMaintenance extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Pastikan UserSeeder dijalankan terlebih dahulu untuk mengisi data PLP
        // Jika belum yakin, bisa ditambahkan call seeder di sini (tidak disarankan untuk produksi besar)
        // $this->call(UserSeeder::class);

        // Ambil semua ID pengguna dengan role 'plp'
        $plpUserIds = DB::table('users')->where('role', 'plp')->pluck('id')->toArray();

        // Beri peringatan jika tidak ada pengguna PLP yang ditemukan
        if (empty($plpUserIds)) {
            $this->command->warn('Tidak ada pengguna dengan role "plp" ditemukan. Harap jalankan UserSeeder terlebih dahulu atau pastikan pengguna PLP sudah ada.');
            return;
        }

        $schedule = [
            [
                "title" => "BU.02 I1",
                "machine_code" => "BU.02",
                "start" => "2025-01-06",
                "end" => "2025-01-12",
                "period_week" => "2",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.02 K1",
                "machine_code" => "BU.02",
                "start" => "2025-04-07",
                "end" => "2025-04-13",
                "period_week" => "2",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.02 I2",
                "machine_code" => "BU.02",
                "start" => "2025-07-07",
                "end" => "2025-07-13",
                "period_week" => "2",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.02 K2",
                "machine_code" => "BU.02",
                "start" => "2025-10-06",
                "end" => "2025-10-12",
                "period_week" => "2",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.02 I3",
                "machine_code" => "BU.02",
                "start" => "2026-01-05",
                "end" => "2026-01-11",
                "period_week" => "2",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.02 M1",
                "machine_code" => "BU.02",
                "start" => "2026-04-06",
                "end" => "2026-04-12",
                "period_week" => "2",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.02 I4",
                "machine_code" => "BU.02",
                "start" => "2026-07-06",
                "end" => "2026-07-12",
                "period_week" => "2",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.02 K3",
                "machine_code" => "BU.02",
                "start" => "2026-10-05",
                "end" => "2026-10-11",
                "period_week" => "2",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.03 I1",
                "machine_code" => "BU.03",
                "start" => "2025-01-13",
                "end" => "2025-01-19",
                "period_week" => "3",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.03 K1",
                "machine_code" => "BU.03",
                "start" => "2025-04-14",
                "end" => "2025-04-20",
                "period_week" => "3",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.03 I2",
                "machine_code" => "BU.03",
                "start" => "2025-07-14",
                "end" => "2025-07-20",
                "period_week" => "3",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.03 K2",
                "machine_code" => "BU.03",
                "start" => "2025-10-13",
                "end" => "2025-10-19",
                "period_week" => "3",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.03 I3",
                "machine_code" => "BU.03",
                "start" => "2026-01-12",
                "end" => "2026-01-18",
                "period_week" => "3",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.03 M1",
                "machine_code" => "BU.03",
                "start" => "2026-04-13",
                "end" => "2026-04-19",
                "period_week" => "3",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.03 I4",
                "machine_code" => "BU.03",
                "start" => "2026-07-13",
                "end" => "2026-07-19",
                "period_week" => "3",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.03 K3",
                "machine_code" => "BU.03",
                "start" => "2026-10-12",
                "end" => "2026-10-18",
                "period_week" => "3",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.04 I1",
                "machine_code" => "BU.04",
                "start" => "2025-01-20",
                "end" => "2025-01-26",
                "period_week" => "4",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.04 K1",
                "machine_code" => "BU.04",
                "start" => "2025-04-21",
                "end" => "2025-04-27",
                "period_week" => "4",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.04 I2",
                "machine_code" => "BU.04",
                "start" => "2025-07-21",
                "end" => "2025-07-27",
                "period_week" => "4",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.04 K2",
                "machine_code" => "BU.04",
                "start" => "2025-10-20",
                "end" => "2025-10-26",
                "period_week" => "4",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.04 I3",
                "machine_code" => "BU.04",
                "start" => "2026-01-19",
                "end" => "2026-01-25",
                "period_week" => "4",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.04 M1",
                "machine_code" => "BU.04",
                "start" => "2026-04-20",
                "end" => "2026-04-26",
                "period_week" => "4",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.04 I4",
                "machine_code" => "BU.04",
                "start" => "2026-07-20",
                "end" => "2026-07-26",
                "period_week" => "4",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.04 K3",
                "machine_code" => "BU.04",
                "start" => "2026-10-19",
                "end" => "2026-10-25",
                "period_week" => "4",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.05 I1",
                "machine_code" => "BU.05",
                "start" => "2025-02-03",
                "end" => "2025-02-09",
                "period_week" => "1",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.05 K1",
                "machine_code" => "BU.05",
                "start" => "2025-05-05",
                "end" => "2025-05-11",
                "period_week" => "1",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.05 I2",
                "machine_code" => "BU.05",
                "start" => "2025-08-04",
                "end" => "2025-08-10",
                "period_week" => "1",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.05 K2",
                "machine_code" => "BU.05",
                "start" => "2025-11-03",
                "end" => "2025-11-09",
                "period_week" => "1",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.05 I3",
                "machine_code" => "BU.05",
                "start" => "2026-02-02",
                "end" => "2026-02-08",
                "period_week" => "1",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.05 M1",
                "machine_code" => "BU.05",
                "start" => "2026-05-04",
                "end" => "2026-05-10",
                "period_week" => "1",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.05 I4",
                "machine_code" => "BU.05",
                "start" => "2026-08-03",
                "end" => "2026-08-09",
                "period_week" => "1",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.05 K3",
                "machine_code" => "BU.05",
                "start" => "2026-11-02",
                "end" => "2026-11-08",
                "period_week" => "1",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.06 I1",
                "machine_code" => "BU.06",
                "start" => "2025-02-10",
                "end" => "2025-02-16",
                "period_week" => "2",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.06 K1",
                "machine_code" => "BU.06",
                "start" => "2025-05-12",
                "end" => "2025-05-18",
                "period_week" => "2",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.06 I2",
                "machine_code" => "BU.06",
                "start" => "2025-08-11",
                "end" => "2025-08-17",
                "period_week" => "2",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.06 K2",
                "machine_code" => "BU.06",
                "start" => "2025-11-10",
                "end" => "2025-11-16",
                "period_week" => "2",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.06 I3",
                "machine_code" => "BU.06",
                "start" => "2026-02-09",
                "end" => "2026-02-15",
                "period_week" => "2",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.06 M1",
                "machine_code" => "BU.06",
                "start" => "2026-05-11",
                "end" => "2026-05-17",
                "period_week" => "2",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.06 I4",
                "machine_code" => "BU.06",
                "start" => "2026-08-10",
                "end" => "2026-08-16",
                "period_week" => "2",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.06 K3",
                "machine_code" => "BU.06",
                "start" => "2026-11-09",
                "end" => "2026-11-15",
                "period_week" => "2",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.07 I1",
                "machine_code" => "BU.07",
                "start" => "2025-02-17",
                "end" => "2025-02-23",
                "period_week" => "3",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.07 K1",
                "machine_code" => "BU.07",
                "start" => "2025-05-19",
                "end" => "2025-05-25",
                "period_week" => "3",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.07 I2",
                "machine_code" => "BU.07",
                "start" => "2025-08-18",
                "end" => "2025-08-24",
                "period_week" => "3",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.07 K2",
                "machine_code" => "BU.07",
                "start" => "2025-11-17",
                "end" => "2025-11-23",
                "period_week" => "3",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.07 I3",
                "machine_code" => "BU.07",
                "start" => "2026-02-16",
                "end" => "2026-02-22",
                "period_week" => "3",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.07 M1",
                "machine_code" => "BU.07",
                "start" => "2026-05-18",
                "end" => "2026-05-24",
                "period_week" => "3",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.07 I4",
                "machine_code" => "BU.07",
                "start" => "2026-08-17",
                "end" => "2026-08-23",
                "period_week" => "3",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.07 K3",
                "machine_code" => "BU.07",
                "start" => "2026-11-16",
                "end" => "2026-11-22",
                "period_week" => "3",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.08 I1",
                "machine_code" => "BU.08",
                "start" => "2025-02-24",
                "end" => "2025-03-02",
                "period_week" => "4",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.08 K1",
                "machine_code" => "BU.08",
                "start" => "2025-05-26",
                "end" => "2025-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.08 I2",
                "machine_code" => "BU.08",
                "start" => "2025-08-25",
                "end" => "2025-08-31",
                "period_week" => "4",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.08 K2",
                "machine_code" => "BU.08",
                "start" => "2025-11-24",
                "end" => "2025-11-30",
                "period_week" => "4",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.08 I3",
                "machine_code" => "BU.08",
                "start" => "2026-02-23",
                "end" => "2026-03-01",
                "period_week" => "4",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.08 M1",
                "machine_code" => "BU.08",
                "start" => "2026-05-26",
                "end" => "2026-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.08 I4",
                "machine_code" => "BU.08",
                "start" => "2026-08-24",
                "end" => "2026-08-30",
                "period_week" => "4",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.08 K3",
                "machine_code" => "BU.08",
                "start" => "2026-11-23",
                "end" => "2026-11-29",
                "period_week" => "4",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.10 I1",
                "machine_code" => "BU.10",
                "start" => "2025-03-03",
                "end" => "2025-03-09",
                "period_week" => "1",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.10 K1",
                "machine_code" => "BU.10",
                "start" => "2025-06-02",
                "end" => "2025-06-08",
                "period_week" => "1",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.10 I2",
                "machine_code" => "BU.10",
                "start" => "2025-09-01",
                "end" => "2025-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.10 K2",
                "machine_code" => "BU.10",
                "start" => "2025-12-01",
                "end" => "2025-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.10 I3",
                "machine_code" => "BU.10",
                "start" => "2026-03-02",
                "end" => "2026-03-08",
                "period_week" => "1",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.10 M1",
                "machine_code" => "BU.10",
                "start" => "2026-06-01",
                "end" => "2026-06-07",
                "period_week" => "1",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.10 I4",
                "machine_code" => "BU.10",
                "start" => "2026-09-01",
                "end" => "2026-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.10 K3",
                "machine_code" => "BU.10",
                "start" => "2026-12-01",
                "end" => "2026-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.11 I1",
                "machine_code" => "BU.11",
                "start" => "2025-03-10",
                "end" => "2025-03-16",
                "period_week" => "2",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.11 K1",
                "machine_code" => "BU.11",
                "start" => "2025-06-09",
                "end" => "2025-06-15",
                "period_week" => "2",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.11 I2",
                "machine_code" => "BU.11",
                "start" => "2025-09-08",
                "end" => "2025-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.11 K2",
                "machine_code" => "BU.11",
                "start" => "2025-12-08",
                "end" => "2025-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.11 I3",
                "machine_code" => "BU.11",
                "start" => "2026-03-09",
                "end" => "2026-03-15",
                "period_week" => "2",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.11 M1",
                "machine_code" => "BU.11",
                "start" => "2026-06-08",
                "end" => "2026-06-14",
                "period_week" => "2",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.11 I4",
                "machine_code" => "BU.11",
                "start" => "2026-09-08",
                "end" => "2026-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.11 K3",
                "machine_code" => "BU.11",
                "start" => "2026-12-08",
                "end" => "2026-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.12 I1",
                "machine_code" => "BU.12",
                "start" => "2025-03-17",
                "end" => "2025-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.12 K1",
                "machine_code" => "BU.12",
                "start" => "2025-06-16",
                "end" => "2025-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.12 I2",
                "machine_code" => "BU.12",
                "start" => "2025-09-15",
                "end" => "2025-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.12 K2",
                "machine_code" => "BU.12",
                "start" => "2025-12-15",
                "end" => "2025-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.12 I3",
                "machine_code" => "BU.12",
                "start" => "2026-03-17",
                "end" => "2026-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.12 M1",
                "machine_code" => "BU.12",
                "start" => "2026-06-16",
                "end" => "2026-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.12 I4",
                "machine_code" => "BU.12",
                "start" => "2026-09-15",
                "end" => "2026-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.12 K3",
                "machine_code" => "BU.12",
                "start" => "2026-12-15",
                "end" => "2026-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.13 I1",
                "machine_code" => "BU.13",
                "start" => "2025-03-24",
                "end" => "2025-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.13 K1",
                "machine_code" => "BU.13",
                "start" => "2025-06-23",
                "end" => "2025-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.13 I2",
                "machine_code" => "BU.13",
                "start" => "2025-09-22",
                "end" => "2025-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.13 K2",
                "machine_code" => "BU.13",
                "start" => "2025-12-22",
                "end" => "2025-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.13 I3",
                "machine_code" => "BU.13",
                "start" => "2026-03-24",
                "end" => "2026-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.13 M1",
                "machine_code" => "BU.13",
                "start" => "2026-06-23",
                "end" => "2026-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.13 I4",
                "machine_code" => "BU.13",
                "start" => "2026-09-22",
                "end" => "2026-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.13 K3",
                "machine_code" => "BU.13",
                "start" => "2026-12-22",
                "end" => "2026-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.14 I1",
                "machine_code" => "BU.14",
                "start" => "2025-01-01",
                "end" => "2025-01-05",
                "period_week" => "1",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.14 K1",
                "machine_code" => "BU.14",
                "start" => "2025-04-01",
                "end" => "2025-04-06",
                "period_week" => "1",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.14 I2",
                "machine_code" => "BU.14",
                "start" => "2025-07-01",
                "end" => "2025-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.14 K2",
                "machine_code" => "BU.14",
                "start" => "2025-10-01",
                "end" => "2025-10-05",
                "period_week" => "1",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.14 I3",
                "machine_code" => "BU.14",
                "start" => "2026-01-01",
                "end" => "2026-01-04",
                "period_week" => "1",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.14 M1",
                "machine_code" => "BU.14",
                "start" => "2026-04-01",
                "end" => "2026-04-05",
                "period_week" => "1",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.14 I4",
                "machine_code" => "BU.14",
                "start" => "2026-07-01",
                "end" => "2026-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.14 K3",
                "machine_code" => "BU.14",
                "start" => "2026-10-01",
                "end" => "2026-10-04",
                "period_week" => "1",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.15 I1",
                "machine_code" => "BU.15",
                "start" => "2025-01-06",
                "end" => "2025-01-12",
                "period_week" => "2",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.15 K1",
                "machine_code" => "BU.15",
                "start" => "2025-04-07",
                "end" => "2025-04-13",
                "period_week" => "2",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.15 I2",
                "machine_code" => "BU.15",
                "start" => "2025-07-07",
                "end" => "2025-07-13",
                "period_week" => "2",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.15 K2",
                "machine_code" => "BU.15",
                "start" => "2025-10-06",
                "end" => "2025-10-12",
                "period_week" => "2",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.15 I3",
                "machine_code" => "BU.15",
                "start" => "2026-01-05",
                "end" => "2026-01-11",
                "period_week" => "2",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.15 M1",
                "machine_code" => "BU.15",
                "start" => "2026-04-06",
                "end" => "2026-04-12",
                "period_week" => "2",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.15 I4",
                "machine_code" => "BU.15",
                "start" => "2026-07-06",
                "end" => "2026-07-12",
                "period_week" => "2",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.15 K3",
                "machine_code" => "BU.15",
                "start" => "2026-10-05",
                "end" => "2026-10-11",
                "period_week" => "2",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.16 I1",
                "machine_code" => "BU.16",
                "start" => "2025-01-13",
                "end" => "2025-01-19",
                "period_week" => "3",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.16 K1",
                "machine_code" => "BU.16",
                "start" => "2025-04-14",
                "end" => "2025-04-20",
                "period_week" => "3",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.16 I2",
                "machine_code" => "BU.16",
                "start" => "2025-07-14",
                "end" => "2025-07-20",
                "period_week" => "3",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.16 K2",
                "machine_code" => "BU.16",
                "start" => "2025-10-13",
                "end" => "2025-10-19",
                "period_week" => "3",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.16 I3",
                "machine_code" => "BU.16",
                "start" => "2026-01-12",
                "end" => "2026-01-18",
                "period_week" => "3",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.16 M1",
                "machine_code" => "BU.16",
                "start" => "2026-04-13",
                "end" => "2026-04-19",
                "period_week" => "3",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.16 I4",
                "machine_code" => "BU.16",
                "start" => "2026-07-13",
                "end" => "2026-07-19",
                "period_week" => "3",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.16 K3",
                "machine_code" => "BU.16",
                "start" => "2026-10-12",
                "end" => "2026-10-18",
                "period_week" => "3",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.17 I1",
                "machine_code" => "BU.17",
                "start" => "2025-01-20",
                "end" => "2025-01-26",
                "period_week" => "4",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.17 K1",
                "machine_code" => "BU.17",
                "start" => "2025-04-21",
                "end" => "2025-04-27",
                "period_week" => "4",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.17 I2",
                "machine_code" => "BU.17",
                "start" => "2025-07-21",
                "end" => "2025-07-27",
                "period_week" => "4",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.17 K2",
                "machine_code" => "BU.17",
                "start" => "2025-10-20",
                "end" => "2025-10-26",
                "period_week" => "4",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.17 I3",
                "machine_code" => "BU.17",
                "start" => "2026-01-19",
                "end" => "2026-01-25",
                "period_week" => "4",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.17 M1",
                "machine_code" => "BU.17",
                "start" => "2026-04-20",
                "end" => "2026-04-26",
                "period_week" => "4",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.17 I4",
                "machine_code" => "BU.17",
                "start" => "2026-07-20",
                "end" => "2026-07-26",
                "period_week" => "4",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.17 K3",
                "machine_code" => "BU.17",
                "start" => "2026-10-19",
                "end" => "2026-10-25",
                "period_week" => "4",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.18 I1",
                "machine_code" => "BU.18",
                "start" => "2025-02-03",
                "end" => "2025-02-09",
                "period_week" => "1",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.18 K1",
                "machine_code" => "BU.18",
                "start" => "2025-05-05",
                "end" => "2025-05-11",
                "period_week" => "1",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.18 I2",
                "machine_code" => "BU.18",
                "start" => "2025-08-04",
                "end" => "2025-08-10",
                "period_week" => "1",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.18 K2",
                "machine_code" => "BU.18",
                "start" => "2025-11-03",
                "end" => "2025-11-09",
                "period_week" => "1",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.18 I3",
                "machine_code" => "BU.18",
                "start" => "2026-02-02",
                "end" => "2026-02-08",
                "period_week" => "1",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.18 M1",
                "machine_code" => "BU.18",
                "start" => "2026-05-04",
                "end" => "2026-05-10",
                "period_week" => "1",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.18 I4",
                "machine_code" => "BU.18",
                "start" => "2026-08-03",
                "end" => "2026-08-09",
                "period_week" => "1",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.18 K3",
                "machine_code" => "BU.18",
                "start" => "2026-11-02",
                "end" => "2026-11-08",
                "period_week" => "1",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.19 I1",
                "machine_code" => "BU.19",
                "start" => "2025-02-10",
                "end" => "2025-02-16",
                "period_week" => "2",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.19 K1",
                "machine_code" => "BU.19",
                "start" => "2025-05-12",
                "end" => "2025-05-18",
                "period_week" => "2",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.19 I2",
                "machine_code" => "BU.19",
                "start" => "2025-08-11",
                "end" => "2025-08-17",
                "period_week" => "2",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.19 K2",
                "machine_code" => "BU.19",
                "start" => "2025-11-10",
                "end" => "2025-11-16",
                "period_week" => "2",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.19 I3",
                "machine_code" => "BU.19",
                "start" => "2026-02-09",
                "end" => "2026-02-15",
                "period_week" => "2",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.19 M1",
                "machine_code" => "BU.19",
                "start" => "2026-05-11",
                "end" => "2026-05-17",
                "period_week" => "2",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.19 I4",
                "machine_code" => "BU.19",
                "start" => "2026-08-10",
                "end" => "2026-08-16",
                "period_week" => "2",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.19 K3",
                "machine_code" => "BU.19",
                "start" => "2026-11-09",
                "end" => "2026-11-15",
                "period_week" => "2",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.20 I1",
                "machine_code" => "BU.20",
                "start" => "2025-02-17",
                "end" => "2025-02-23",
                "period_week" => "3",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.20 K1",
                "machine_code" => "BU.20",
                "start" => "2025-05-19",
                "end" => "2025-05-25",
                "period_week" => "3",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.20 I2",
                "machine_code" => "BU.20",
                "start" => "2025-08-18",
                "end" => "2025-08-24",
                "period_week" => "3",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.20 K2",
                "machine_code" => "BU.20",
                "start" => "2025-11-17",
                "end" => "2025-11-23",
                "period_week" => "3",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.20 I3",
                "machine_code" => "BU.20",
                "start" => "2026-02-16",
                "end" => "2026-02-22",
                "period_week" => "3",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.20 M1",
                "machine_code" => "BU.20",
                "start" => "2026-05-18",
                "end" => "2026-05-24",
                "period_week" => "3",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.20 I4",
                "machine_code" => "BU.20",
                "start" => "2026-08-17",
                "end" => "2026-08-23",
                "period_week" => "3",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.20 K3",
                "machine_code" => "BU.20",
                "start" => "2026-11-16",
                "end" => "2026-11-22",
                "period_week" => "3",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.21 I1",
                "machine_code" => "BU.21",
                "start" => "2025-02-24",
                "end" => "2025-03-02",
                "period_week" => "4",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.21 K1",
                "machine_code" => "BU.21",
                "start" => "2025-05-26",
                "end" => "2025-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.21 I2",
                "machine_code" => "BU.21",
                "start" => "2025-08-25",
                "end" => "2025-08-31",
                "period_week" => "4",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.21 K2",
                "machine_code" => "BU.21",
                "start" => "2025-11-24",
                "end" => "2025-11-30",
                "period_week" => "4",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.21 I3",
                "machine_code" => "BU.21",
                "start" => "2026-02-23",
                "end" => "2026-03-01",
                "period_week" => "4",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.21 M1",
                "machine_code" => "BU.21",
                "start" => "2026-05-26",
                "end" => "2026-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.21 I4",
                "machine_code" => "BU.21",
                "start" => "2026-08-24",
                "end" => "2026-08-30",
                "period_week" => "4",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.21 K3",
                "machine_code" => "BU.21",
                "start" => "2026-11-23",
                "end" => "2026-11-29",
                "period_week" => "4",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.22 I1",
                "machine_code" => "BU.22",
                "start" => "2025-03-03",
                "end" => "2025-03-09",
                "period_week" => "1",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.22 K1",
                "machine_code" => "BU.22",
                "start" => "2025-06-02",
                "end" => "2025-06-08",
                "period_week" => "1",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.22 I2",
                "machine_code" => "BU.22",
                "start" => "2025-09-01",
                "end" => "2025-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.22 K2",
                "machine_code" => "BU.22",
                "start" => "2025-12-01",
                "end" => "2025-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.22 I3",
                "machine_code" => "BU.22",
                "start" => "2026-03-02",
                "end" => "2026-03-08",
                "period_week" => "1",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.22 M1",
                "machine_code" => "BU.22",
                "start" => "2026-06-01",
                "end" => "2026-06-07",
                "period_week" => "1",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.22 I4",
                "machine_code" => "BU.22",
                "start" => "2026-09-01",
                "end" => "2026-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.22 K3",
                "machine_code" => "BU.22",
                "start" => "2026-12-01",
                "end" => "2026-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.23 I1",
                "machine_code" => "BU.23",
                "start" => "2025-03-10",
                "end" => "2025-03-16",
                "period_week" => "2",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.23 K1",
                "machine_code" => "BU.23",
                "start" => "2025-06-09",
                "end" => "2025-06-15",
                "period_week" => "2",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.23 I2",
                "machine_code" => "BU.23",
                "start" => "2025-09-08",
                "end" => "2025-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.23 K2",
                "machine_code" => "BU.23",
                "start" => "2025-12-08",
                "end" => "2025-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.23 I3",
                "machine_code" => "BU.23",
                "start" => "2026-03-09",
                "end" => "2026-03-15",
                "period_week" => "2",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.23 M1",
                "machine_code" => "BU.23",
                "start" => "2026-06-08",
                "end" => "2026-06-14",
                "period_week" => "2",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.23 I4",
                "machine_code" => "BU.23",
                "start" => "2026-09-08",
                "end" => "2026-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.23 K3",
                "machine_code" => "BU.23",
                "start" => "2026-12-08",
                "end" => "2026-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.24 I1",
                "machine_code" => "BU.24",
                "start" => "2025-03-17",
                "end" => "2025-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.24 K1",
                "machine_code" => "BU.24",
                "start" => "2025-06-16",
                "end" => "2025-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.24 I2",
                "machine_code" => "BU.24",
                "start" => "2025-09-15",
                "end" => "2025-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.24 K2",
                "machine_code" => "BU.24",
                "start" => "2025-12-15",
                "end" => "2025-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.24 I3",
                "machine_code" => "BU.24",
                "start" => "2026-03-17",
                "end" => "2026-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.24 M1",
                "machine_code" => "BU.24",
                "start" => "2026-06-16",
                "end" => "2026-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.24 I4",
                "machine_code" => "BU.24",
                "start" => "2026-09-15",
                "end" => "2026-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.24 K3",
                "machine_code" => "BU.24",
                "start" => "2026-12-15",
                "end" => "2026-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.25 I1",
                "machine_code" => "BU.25",
                "start" => "2025-03-03",
                "end" => "2025-03-09",
                "period_week" => "1",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.25 K1",
                "machine_code" => "BU.25",
                "start" => "2025-06-02",
                "end" => "2025-06-08",
                "period_week" => "1",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.25 I2",
                "machine_code" => "BU.25",
                "start" => "2025-09-01",
                "end" => "2025-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.25 K2",
                "machine_code" => "BU.25",
                "start" => "2025-12-01",
                "end" => "2025-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.25 I3",
                "machine_code" => "BU.25",
                "start" => "2026-03-02",
                "end" => "2026-03-08",
                "period_week" => "1",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.25 M1",
                "machine_code" => "BU.25",
                "start" => "2026-06-01",
                "end" => "2026-06-07",
                "period_week" => "1",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.25 I4",
                "machine_code" => "BU.25",
                "start" => "2026-09-01",
                "end" => "2026-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.25 K3",
                "machine_code" => "BU.25",
                "start" => "2026-12-01",
                "end" => "2026-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.26 I1",
                "machine_code" => "BU.26",
                "start" => "2025-03-10",
                "end" => "2025-03-16",
                "period_week" => "2",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.26 K1",
                "machine_code" => "BU.26",
                "start" => "2025-06-09",
                "end" => "2025-06-15",
                "period_week" => "2",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.26 I2",
                "machine_code" => "BU.26",
                "start" => "2025-09-08",
                "end" => "2025-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.26 K2",
                "machine_code" => "BU.26",
                "start" => "2025-12-08",
                "end" => "2025-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.26 I3",
                "machine_code" => "BU.26",
                "start" => "2026-03-09",
                "end" => "2026-03-15",
                "period_week" => "2",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.26 M1",
                "machine_code" => "BU.26",
                "start" => "2026-06-08",
                "end" => "2026-06-14",
                "period_week" => "2",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.26 I4",
                "machine_code" => "BU.26",
                "start" => "2026-09-08",
                "end" => "2026-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.26 K3",
                "machine_code" => "BU.26",
                "start" => "2026-12-08",
                "end" => "2026-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.27 I1",
                "machine_code" => "BU.27",
                "start" => "2025-03-17",
                "end" => "2025-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.27 K1",
                "machine_code" => "BU.27",
                "start" => "2025-06-16",
                "end" => "2025-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.27 I2",
                "machine_code" => "BU.27",
                "start" => "2025-09-15",
                "end" => "2025-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.27 K2",
                "machine_code" => "BU.27",
                "start" => "2025-12-15",
                "end" => "2025-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.27 I3",
                "machine_code" => "BU.27",
                "start" => "2026-03-17",
                "end" => "2026-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.27 M1",
                "machine_code" => "BU.27",
                "start" => "2026-06-16",
                "end" => "2026-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.27 I4",
                "machine_code" => "BU.27",
                "start" => "2026-09-15",
                "end" => "2026-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.27 K3",
                "machine_code" => "BU.27",
                "start" => "2026-12-15",
                "end" => "2026-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.28 I1",
                "machine_code" => "BU.28",
                "start" => "2025-03-24",
                "end" => "2025-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.28 K1",
                "machine_code" => "BU.28",
                "start" => "2025-06-23",
                "end" => "2025-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.28 I2",
                "machine_code" => "BU.28",
                "start" => "2025-09-22",
                "end" => "2025-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.28 K2",
                "machine_code" => "BU.28",
                "start" => "2025-12-22",
                "end" => "2025-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "BU.28 I3",
                "machine_code" => "BU.28",
                "start" => "2026-03-24",
                "end" => "2026-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.28 M1",
                "machine_code" => "BU.28",
                "start" => "2026-06-23",
                "end" => "2026-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.28 I4",
                "machine_code" => "BU.28",
                "start" => "2026-09-22",
                "end" => "2026-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.28 K3",
                "machine_code" => "BU.28",
                "start" => "2026-12-22",
                "end" => "2026-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "BU.29 I1",
                "machine_code" => "BU.29",
                "start" => "2025-04-01",
                "end" => "2025-04-06",
                "period_week" => "1",
                "month" => "4",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.29 K1",
                "machine_code" => "BU.29",
                "start" => "2025-07-01",
                "end" => "2025-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.29 I2",
                "machine_code" => "BU.29",
                "start" => "2025-10-01",
                "end" => "2025-10-05",
                "period_week" => "1",
                "month" => "10",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.29 K2",
                "machine_code" => "BU.29",
                "start" => "2026-01-01",
                "end" => "2026-01-04",
                "period_week" => "1",
                "month" => "1",
                "year" => "2026",
                "description" => "K2"
            ],
            [
                "title" => "BU.29 I3",
                "machine_code" => "BU.29",
                "start" => "2026-04-01",
                "end" => "2026-04-05",
                "period_week" => "1",
                "month" => "4",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.29 M1",
                "machine_code" => "BU.29",
                "start" => "2026-07-01",
                "end" => "2026-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.29 I4",
                "machine_code" => "BU.29",
                "start" => "2026-10-01",
                "end" => "2026-10-04",
                "period_week" => "1",
                "month" => "10",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "BU.30 I1",
                "machine_code" => "BU.30",
                "start" => "2025-04-07",
                "end" => "2025-04-13",
                "period_week" => "2",
                "month" => "4",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "BU.30 K1",
                "machine_code" => "BU.30",
                "start" => "2025-07-07",
                "end" => "2025-07-13",
                "period_week" => "2",
                "month" => "7",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "BU.30 I2",
                "machine_code" => "BU.30",
                "start" => "2025-10-06",
                "end" => "2025-10-12",
                "period_week" => "2",
                "month" => "10",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "BU.30 K2",
                "machine_code" => "BU.30",
                "start" => "2026-01-05",
                "end" => "2026-01-11",
                "period_week" => "2",
                "month" => "1",
                "year" => "2026",
                "description" => "K2"
            ],
            [
                "title" => "BU.30 I3",
                "machine_code" => "BU.30",
                "start" => "2026-04-06",
                "end" => "2026-04-12",
                "period_week" => "2",
                "month" => "4",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "BU.30 M1",
                "machine_code" => "BU.30",
                "start" => "2026-07-06",
                "end" => "2026-07-12",
                "period_week" => "2",
                "month" => "7",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "BU.30 I4",
                "machine_code" => "BU.30",
                "start" => "2026-10-05",
                "end" => "2026-10-11",
                "period_week" => "2",
                "month" => "10",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.01 I1",
                "machine_code" => "FR.01",
                "start" => "2025-01-01",
                "end" => "2025-01-05",
                "period_week" => "1",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.01 K1",
                "machine_code" => "FR.01",
                "start" => "2025-04-01",
                "end" => "2025-04-06",
                "period_week" => "1",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.01 I2",
                "machine_code" => "FR.01",
                "start" => "2025-07-01",
                "end" => "2025-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.01 K2",
                "machine_code" => "FR.01",
                "start" => "2025-10-01",
                "end" => "2025-10-05",
                "period_week" => "1",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.01 I3",
                "machine_code" => "FR.01",
                "start" => "2026-01-01",
                "end" => "2026-01-04",
                "period_week" => "1",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.01 M1",
                "machine_code" => "FR.01",
                "start" => "2026-04-01",
                "end" => "2026-04-05",
                "period_week" => "1",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.01 I4",
                "machine_code" => "FR.01",
                "start" => "2026-07-01",
                "end" => "2026-07-06",
                "period_week" => "1",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.01 K3",
                "machine_code" => "FR.01",
                "start" => "2026-10-01",
                "end" => "2026-10-04",
                "period_week" => "1",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.02 I1",
                "machine_code" => "FR.02",
                "start" => "2025-01-06",
                "end" => "2025-01-12",
                "period_week" => "2",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.02 K1",
                "machine_code" => "FR.02",
                "start" => "2025-04-07",
                "end" => "2025-04-13",
                "period_week" => "2",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.02 I2",
                "machine_code" => "FR.02",
                "start" => "2025-07-07",
                "end" => "2025-07-13",
                "period_week" => "2",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.02 K2",
                "machine_code" => "FR.02",
                "start" => "2025-10-06",
                "end" => "2025-10-12",
                "period_week" => "2",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.02 I3",
                "machine_code" => "FR.02",
                "start" => "2026-01-05",
                "end" => "2026-01-11",
                "period_week" => "2",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.02 M1",
                "machine_code" => "FR.02",
                "start" => "2026-04-06",
                "end" => "2026-04-12",
                "period_week" => "2",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.02 I4",
                "machine_code" => "FR.02",
                "start" => "2026-07-06",
                "end" => "2026-07-12",
                "period_week" => "2",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.02 K3",
                "machine_code" => "FR.02",
                "start" => "2026-10-05",
                "end" => "2026-10-11",
                "period_week" => "2",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.03 I1",
                "machine_code" => "FR.03",
                "start" => "2025-01-13",
                "end" => "2025-01-19",
                "period_week" => "3",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.03 K1",
                "machine_code" => "FR.03",
                "start" => "2025-04-14",
                "end" => "2025-04-20",
                "period_week" => "3",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.03 I2",
                "machine_code" => "FR.03",
                "start" => "2025-07-14",
                "end" => "2025-07-20",
                "period_week" => "3",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.03 K2",
                "machine_code" => "FR.03",
                "start" => "2025-10-13",
                "end" => "2025-10-19",
                "period_week" => "3",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.03 I3",
                "machine_code" => "FR.03",
                "start" => "2026-01-12",
                "end" => "2026-01-18",
                "period_week" => "3",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.03 M1",
                "machine_code" => "FR.03",
                "start" => "2026-04-13",
                "end" => "2026-04-19",
                "period_week" => "3",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.03 I4",
                "machine_code" => "FR.03",
                "start" => "2026-07-13",
                "end" => "2026-07-19",
                "period_week" => "3",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.03 K3",
                "machine_code" => "FR.03",
                "start" => "2026-10-12",
                "end" => "2026-10-18",
                "period_week" => "3",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.04 I1",
                "machine_code" => "FR.04",
                "start" => "2025-01-20",
                "end" => "2025-01-26",
                "period_week" => "4",
                "month" => "1",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.04 K1",
                "machine_code" => "FR.04",
                "start" => "2025-04-21",
                "end" => "2025-04-27",
                "period_week" => "4",
                "month" => "4",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.04 I2",
                "machine_code" => "FR.04",
                "start" => "2025-07-21",
                "end" => "2025-07-27",
                "period_week" => "4",
                "month" => "7",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.04 K2",
                "machine_code" => "FR.04",
                "start" => "2025-10-20",
                "end" => "2025-10-26",
                "period_week" => "4",
                "month" => "10",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.04 I3",
                "machine_code" => "FR.04",
                "start" => "2026-01-19",
                "end" => "2026-01-25",
                "period_week" => "4",
                "month" => "1",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.04 M1",
                "machine_code" => "FR.04",
                "start" => "2026-04-20",
                "end" => "2026-04-26",
                "period_week" => "4",
                "month" => "4",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.04 I4",
                "machine_code" => "FR.04",
                "start" => "2026-07-20",
                "end" => "2026-07-26",
                "period_week" => "4",
                "month" => "7",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.04 K3",
                "machine_code" => "FR.04",
                "start" => "2026-10-19",
                "end" => "2026-10-25",
                "period_week" => "4",
                "month" => "10",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.05 I1",
                "machine_code" => "FR.05",
                "start" => "2025-02-03",
                "end" => "2025-02-09",
                "period_week" => "1",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.05 K1",
                "machine_code" => "FR.05",
                "start" => "2025-05-05",
                "end" => "2025-05-11",
                "period_week" => "1",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.05 I2",
                "machine_code" => "FR.05",
                "start" => "2025-08-04",
                "end" => "2025-08-10",
                "period_week" => "1",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.05 K2",
                "machine_code" => "FR.05",
                "start" => "2025-11-03",
                "end" => "2025-11-09",
                "period_week" => "1",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.05 I3",
                "machine_code" => "FR.05",
                "start" => "2026-02-02",
                "end" => "2026-02-08",
                "period_week" => "1",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.05 M1",
                "machine_code" => "FR.05",
                "start" => "2026-05-04",
                "end" => "2026-05-10",
                "period_week" => "1",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.05 I4",
                "machine_code" => "FR.05",
                "start" => "2026-08-03",
                "end" => "2026-08-09",
                "period_week" => "1",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.05 K3",
                "machine_code" => "FR.05",
                "start" => "2026-11-02",
                "end" => "2026-11-08",
                "period_week" => "1",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.06 I1",
                "machine_code" => "FR.06",
                "start" => "2025-02-10",
                "end" => "2025-02-16",
                "period_week" => "2",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.06 K1",
                "machine_code" => "FR.06",
                "start" => "2025-05-12",
                "end" => "2025-05-18",
                "period_week" => "2",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.06 I2",
                "machine_code" => "FR.06",
                "start" => "2025-08-11",
                "end" => "2025-08-17",
                "period_week" => "2",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.06 K2",
                "machine_code" => "FR.06",
                "start" => "2025-11-10",
                "end" => "2025-11-16",
                "period_week" => "2",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.06 I3",
                "machine_code" => "FR.06",
                "start" => "2026-02-09",
                "end" => "2026-02-15",
                "period_week" => "2",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.06 M1",
                "machine_code" => "FR.06",
                "start" => "2026-05-11",
                "end" => "2026-05-17",
                "period_week" => "2",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.06 I4",
                "machine_code" => "FR.06",
                "start" => "2026-08-10",
                "end" => "2026-08-16",
                "period_week" => "2",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.06 K3",
                "machine_code" => "FR.06",
                "start" => "2026-11-09",
                "end" => "2026-11-15",
                "period_week" => "2",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.07 I1",
                "machine_code" => "FR.07",
                "start" => "2025-02-17",
                "end" => "2025-02-23",
                "period_week" => "3",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.07 K1",
                "machine_code" => "FR.07",
                "start" => "2025-05-19",
                "end" => "2025-05-25",
                "period_week" => "3",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.07 I2",
                "machine_code" => "FR.07",
                "start" => "2025-08-18",
                "end" => "2025-08-24",
                "period_week" => "3",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.07 K2",
                "machine_code" => "FR.07",
                "start" => "2025-11-17",
                "end" => "2025-11-23",
                "period_week" => "3",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.07 I3",
                "machine_code" => "FR.07",
                "start" => "2026-02-16",
                "end" => "2026-02-22",
                "period_week" => "3",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.07 M1",
                "machine_code" => "FR.07",
                "start" => "2026-05-18",
                "end" => "2026-05-24",
                "period_week" => "3",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.07 I4",
                "machine_code" => "FR.07",
                "start" => "2026-08-17",
                "end" => "2026-08-23",
                "period_week" => "3",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.07 K3",
                "machine_code" => "FR.07",
                "start" => "2026-11-16",
                "end" => "2026-11-22",
                "period_week" => "3",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.08 I1",
                "machine_code" => "FR.08",
                "start" => "2025-02-24",
                "end" => "2025-03-02",
                "period_week" => "4",
                "month" => "2",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.08 K1",
                "machine_code" => "FR.08",
                "start" => "2025-05-26",
                "end" => "2025-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.08 I2",
                "machine_code" => "FR.08",
                "start" => "2025-08-25",
                "end" => "2025-08-31",
                "period_week" => "4",
                "month" => "8",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.08 K2",
                "machine_code" => "FR.08",
                "start" => "2025-11-24",
                "end" => "2025-11-30",
                "period_week" => "4",
                "month" => "11",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.08 I3",
                "machine_code" => "FR.08",
                "start" => "2026-02-23",
                "end" => "2026-03-01",
                "period_week" => "4",
                "month" => "2",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.08 M1",
                "machine_code" => "FR.08",
                "start" => "2026-05-26",
                "end" => "2026-06-01",
                "period_week" => "4",
                "month" => "5",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.08 I4",
                "machine_code" => "FR.08",
                "start" => "2026-08-24",
                "end" => "2026-08-30",
                "period_week" => "4",
                "month" => "8",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.08 K3",
                "machine_code" => "FR.08",
                "start" => "2026-11-23",
                "end" => "2026-11-29",
                "period_week" => "4",
                "month" => "11",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.09 I1",
                "machine_code" => "FR.09",
                "start" => "2025-03-03",
                "end" => "2025-03-09",
                "period_week" => "1",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.09 K1",
                "machine_code" => "FR.09",
                "start" => "2025-06-02",
                "end" => "2025-06-08",
                "period_week" => "1",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.09 I2",
                "machine_code" => "FR.09",
                "start" => "2025-09-01",
                "end" => "2025-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.09 K2",
                "machine_code" => "FR.09",
                "start" => "2025-12-01",
                "end" => "2025-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.09 I3",
                "machine_code" => "FR.09",
                "start" => "2026-03-02",
                "end" => "2026-03-08",
                "period_week" => "1",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.09 M1",
                "machine_code" => "FR.09",
                "start" => "2026-06-01",
                "end" => "2026-06-07",
                "period_week" => "1",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.09 I4",
                "machine_code" => "FR.09",
                "start" => "2026-09-01",
                "end" => "2026-09-07",
                "period_week" => "1",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.09 K3",
                "machine_code" => "FR.09",
                "start" => "2026-12-01",
                "end" => "2026-12-07",
                "period_week" => "1",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.10 I1",
                "machine_code" => "FR.10",
                "start" => "2025-03-10",
                "end" => "2025-03-16",
                "period_week" => "2",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.10 K1",
                "machine_code" => "FR.10",
                "start" => "2025-06-09",
                "end" => "2025-06-15",
                "period_week" => "2",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.10 I2",
                "machine_code" => "FR.10",
                "start" => "2025-09-08",
                "end" => "2025-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.10 K2",
                "machine_code" => "FR.10",
                "start" => "2025-12-08",
                "end" => "2025-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.10 I3",
                "machine_code" => "FR.10",
                "start" => "2026-03-09",
                "end" => "2026-03-15",
                "period_week" => "2",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.10 M1",
                "machine_code" => "FR.10",
                "start" => "2026-06-08",
                "end" => "2026-06-14",
                "period_week" => "2",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.10 I4",
                "machine_code" => "FR.10",
                "start" => "2026-09-08",
                "end" => "2026-09-14",
                "period_week" => "2",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.10 K3",
                "machine_code" => "FR.10",
                "start" => "2026-12-08",
                "end" => "2026-12-14",
                "period_week" => "2",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.11 I1",
                "machine_code" => "FR.11",
                "start" => "2025-03-17",
                "end" => "2025-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.11 K1",
                "machine_code" => "FR.11",
                "start" => "2025-06-16",
                "end" => "2025-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.11 I2",
                "machine_code" => "FR.11",
                "start" => "2025-09-15",
                "end" => "2025-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.11 K2",
                "machine_code" => "FR.11",
                "start" => "2025-12-15",
                "end" => "2025-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.11 I3",
                "machine_code" => "FR.11",
                "start" => "2026-03-17",
                "end" => "2026-03-23",
                "period_week" => "3",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.11 M1",
                "machine_code" => "FR.11",
                "start" => "2026-06-16",
                "end" => "2026-06-22",
                "period_week" => "3",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.11 I4",
                "machine_code" => "FR.11",
                "start" => "2026-09-15",
                "end" => "2026-09-21",
                "period_week" => "3",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.11 K3",
                "machine_code" => "FR.11",
                "start" => "2026-12-15",
                "end" => "2026-12-21",
                "period_week" => "3",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ],
            [
                "title" => "FR.12 I1",
                "machine_code" => "FR.12",
                "start" => "2025-03-24",
                "end" => "2025-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2025",
                "description" => "I1"
            ],
            [
                "title" => "FR.12 K1",
                "machine_code" => "FR.12",
                "start" => "2025-06-23",
                "end" => "2025-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2025",
                "description" => "K1"
            ],
            [
                "title" => "FR.12 I2",
                "machine_code" => "FR.12",
                "start" => "2025-09-22",
                "end" => "2025-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2025",
                "description" => "I2"
            ],
            [
                "title" => "FR.12 K2",
                "machine_code" => "FR.12",
                "start" => "2025-12-22",
                "end" => "2025-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2025",
                "description" => "K2"
            ],
            [
                "title" => "FR.12 I3",
                "machine_code" => "FR.12",
                "start" => "2026-03-24",
                "end" => "2026-03-30",
                "period_week" => "4",
                "month" => "3",
                "year" => "2026",
                "description" => "I3"
            ],
            [
                "title" => "FR.12 M1",
                "machine_code" => "FR.12",
                "start" => "2026-06-23",
                "end" => "2026-06-29",
                "period_week" => "4",
                "month" => "6",
                "year" => "2026",
                "description" => "M1"
            ],
            [
                "title" => "FR.12 I4",
                "machine_code" => "FR.12",
                "start" => "2026-09-22",
                "end" => "2026-09-28",
                "period_week" => "4",
                "month" => "9",
                "year" => "2026",
                "description" => "I4"
            ],
            [
                "title" => "FR.12 K3",
                "machine_code" => "FR.12",
                "start" => "2026-12-22",
                "end" => "2026-12-28",
                "period_week" => "4",
                "month" => "12",
                "year" => "2026",
                "description" => "K3"
            ]
        ];

        foreach ($schedule as $machine) {
            // Pilih ID PLP user secara acak dari daftar yang tersedia
            // $randomPlpUserId = $plpUserIds[array_rand($plpUserIds)];

            DB::table('calendar_schedules')->insert([
                'title' => $machine['title'],
                'machine_code' => $machine['machine_code'],
                'start' => $machine['start'],
                'end' => $machine['end'],
                'period_week' => $machine['period_week'],
                'month' => $machine['month'],
                'year' => $machine['year'],
                'description' => $machine['description'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
