<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plp_data = [
            [
                'name' => 'Abdul Budi',
                'username' => 'abdulbudi',
                'jenis_kelamin' => 'L',
                'sektor' => 'Perawatan Mesin',
                'role' => 'plp',
            ],
            [
                'name' => 'Achmad Rusdy',
                'username' => 'achmadrusdy',
                'jenis_kelamin' => 'L',
                'sektor' => 'Bubut',
                'role' => 'plp',
            ],
            [
                'name' => 'Agus Wanto',
                'username' => 'aguswanto',
                'jenis_kelamin' => 'L',
                'sektor' => 'Las dan Heat Treatment',
                'role' => 'plp',
            ],
            [
                'name' => 'Achmad Apriadi',
                'username' => 'achmadapriadi',
                'jenis_kelamin' => 'L',
                'sektor' => 'CNC dan Molding',
                'role' => 'plp',
            ],
            [
                'name' => 'Amril Eza',
                'username' => 'amrileza',
                'jenis_kelamin' => 'L',
                'sektor' => 'Molding dan Karakterisasi Material',
                'role' => 'plp',
            ],
            [
                'name' => 'Danny Abie Ariestio',
                'username' => 'dannyabieariestio',
                'jenis_kelamin' => 'L',
                'sektor' => 'Perawatan Mesin, Gerinda Datar, Gerinda Silinder',
                'role' => 'plp',
            ],
            [
                'name' => 'Hadir', // Corrected name from 'Hedir' based on common spelling
                'username' => 'hadir', // Corrected name from 'Hedir' based on common spelling
                'jenis_kelamin' => 'L',
                'sektor' => 'Logistik',
                'role' => 'plp',
            ],
            [
                'name' => 'Julia Andita',
                'username' => 'juliaandita',
                'jenis_kelamin' => 'P',
                'sektor' => 'Perawatan Mesin',
                'role' => 'plp',
            ],
            [
                'name' => 'Mego Wahyudu',
                'username' => 'megowahyudu',
                'jenis_kelamin' => 'L',
                'sektor' => 'Frais',
                'role' => 'plp',
            ],
            [
                'name' => 'Sutrisno',
                'username' => 'Sutrisno',
                'jenis_kelamin' => 'L',
                'sektor' => 'CTS dan Perawatan Mesin',
                'role' => 'plp',
            ],
        ];

        foreach ($plp_data as $user_data) {
            $name_slug = Str::slug($user_data['name'], ''); // Remove spaces for password
            $email_name = Str::slug($user_data['name'], '.'); // For email, use dot as separator

            DB::table('users')->insert([
                'name' => $user_data['name'],
                'username' => $user_data['username'],
                'email' => $email_name . '@polman-babel.ac.id', // Example email domain
                'password' => Hash::make($name_slug), // Password is name without spaces
                'jenis_kelamin' => $user_data['jenis_kelamin'],
                'sektor' => $user_data['sektor'],
                'role' => $user_data['role'],
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Data Kepala Jurusan (random)
        $kepala_jurusan_name = 'Dr. Ir. Budi Santoso'; // Contoh nama Kepala Jurusan
        $kepala_jurusan_email = 'budi.santoso@polman-babel.ac.id'; // Contoh email Kepala Jurusan
        $kepala_jurusan_password = 'password'; // Password standar untuk Kepala Jurusan

        DB::table('users')->insert([
            'name' => $kepala_jurusan_name,
            'username' => 'budisan',
            'email' => $kepala_jurusan_email,
            'password' => Hash::make($kepala_jurusan_password),
            'jenis_kelamin' => 'L', // Randomly set to L or P
            'sektor' => 'Kepala Jurusan',
            'role' => 'kepala_jurusan',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
