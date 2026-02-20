<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data users
        $budi = DB::table('users')->where('name', 'Budi Santoso')->first();
        $nasya = DB::table('users')->where('name', 'Nasya Tiyana')->first();
        $mutiara = DB::table('users')->where('name', 'Mutiara Anindya')->first();
        $wildan = DB::table('users')->where('name', 'Muhammad wildan')->first();
        
        // Ambil divisi - PAKAI NAMA YANG SESUAI
        $divisiMa = DB::table('divisions')->where('name', 'Divisi MA')->first();
        $divisiManagement = DB::table('divisions')->where('name', 'Divisi Management')->first();

        // VALIDASI
        if (!$budi || !$nasya || !$mutiara || !$wildan) {
            throw new \Exception("User tidak ditemukan! Jalankan UserSeeder dulu.");
        }

        if (!$divisiMa || !$divisiManagement) {
            throw new \Exception("Divisi tidak ditemukan! Jalankan DivisionSeeder dulu.");
        }

        // Jadwal untuk Budi Santoso
        DB::table('schedules')->insert([
            [
                'user_id' => $budi->id,
                'division_id' => $divisiMa->id,
                'date' => '2026-01-05',
                'day' => 'Senin',
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'location' => 'Ruang IT - Lantai 2',
                'description' => 'Piket Ruang IT - Membersihkan ruang IT',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Jadwal untuk Nasya
            [
                'user_id' => $nasya->id,
                'division_id' => $divisiManagement->id,
                'date' => '2026-01-05',
                'day' => 'Senin',
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'location' => 'Ruang Kelas',
                'description' => 'Membersihkan papan tulis',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Jadwal untuk Mutiara
            [
                'user_id' => $mutiara->id,
                'division_id' => $divisiManagement->id,
                'date' => '2026-01-05',
                'day' => 'Senin',
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'location' => 'Koridor',
                'description' => 'Mengepel lantai',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Jadwal untuk Wildan
            [
                'user_id' => $wildan->id,
                'division_id' => $divisiManagement->id,
                'date' => '2026-01-05',
                'day' => 'Senin',
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'location' => 'Lapangan',
                'description' => 'Menyapu lantai',
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Tambah jadwal random
        $otherUsers = DB::table('users')
            ->whereNotIn('name', ['Budi Santoso', 'Nasya Tiyana', 'Mutiara Anindya', 'Muhammad wildan'])
            ->get();

        $locations = ['Ruang IT', 'Ruang Server', 'Ruang Gym', 'Dapur', 'Mushola', 'Ruang Meeting'];
        $descriptions = [
            'Membersihkan ruangan',
            'Menyapu lantai',
            'Mengepel lantai', 
            'Membersihkan kaca',
            'Merapikan kursi',
            'Membersihkan papan tulis'
        ];
        $statuses = ['pending', 'completed'];

        foreach ($otherUsers as $index => $user) {
            if ($index < 5) {
                DB::table('schedules')->insert([
                    'user_id' => $user->id,
                    'division_id' => $user->division_id,
                    'date' => now()->addDays($index)->format('Y-m-d'),
                    'day' => now()->addDays($index)->format('l'),
                    'start_time' => '07:00:00',
                    'end_time' => '08:00:00',
                    'location' => $locations[array_rand($locations)],
                    'description' => $descriptions[array_rand($descriptions)],
                    'status' => $statuses[array_rand($statuses)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}