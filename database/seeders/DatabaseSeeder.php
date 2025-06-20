<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            MachineSeeder::class,
            ComponentSeeder::class,
            SparepartSeeder::class,     // Ini harus pertama di antara sparepart
            SparepartHistorySeeder::class, // Ini butuh spareparts dan users
            SparepartRequestSeeder::class, // Ini juga butuh spareparts dan users
        ]);
    }
}
