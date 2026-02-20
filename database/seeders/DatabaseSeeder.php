<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // URUTAN PENTING!
        $this->call([
            DivisionSeeder::class,     // 1. Buat divisions dulu
            UserSeeder::class,         // 2. Baru users (butuh division_id)
            ScheduleSeeder::class,     // 3. Jadwal (butuh user_id & division_id)
            // ReportSeeder::class,    // 4. Opsional
            // NotificationSeeder::class, // 5. Opsional
        ]);
    }
}