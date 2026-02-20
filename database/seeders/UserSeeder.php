<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // CEK APAKAH USER SUDAH ADA (untuk menghindari duplikat)
        if (DB::table('users')->count() > 0) {
            echo "⚠️  Users sudah ada, skipping UserSeeder...\n";
            return;
        }

        // Ambil ID divisi
        $divisiManagement = DB::table('divisions')->where('name', 'Divisi Management')->first();
        $divisiMa = DB::table('divisions')->where('name', 'Divisi MA')->first();
        $divisiMakro = DB::table('divisions')->where('name', 'Divisi Makro')->first();
        $divisiProgrammer = DB::table('divisions')->where('name', 'Divisi Programmer')->first();

        // VALIDASI
        if (!$divisiManagement || !$divisiMa || !$divisiMakro || !$divisiProgrammer) {
            throw new \Exception("❌ Divisi tidak lengkap! Jalankan DivisionSeeder dulu.");
        }

        echo "✅ Seeding users...\n";

        // Users utama - SESUAIKAN DENGAN KOLOM DI MIGRATION
        $users = [
            // BUDI SANTOSO
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'division_id' => $divisiMa->id,
                'id_number' => 1,
                'is_active' => true,
            ],
            // Nasya Tiyana
            [
                'name' => 'Nasya Tiyana',
                'email' => 'nasya@example.com',
                'division_id' => $divisiManagement->id,
                'id_number' => 6,
                'is_active' => true,
            ],
            // Mutiara Anindya
            [
                'name' => 'Mutiara Anindya',
                'email' => 'mutiara@example.com',
                'division_id' => $divisiManagement->id,
                'id_number' => 9,
                'is_active' => true,
            ],
            // Muhammad wildan
            [
                'name' => 'Muhammad wildan',
                'email' => 'wildan@example.com',
                'division_id' => $divisiManagement->id,
                'id_number' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($users as $user) {
            // CEK DUPLIKAT id_number
            $exists = DB::table('users')->where('id_number', $user['id_number'])->exists();
            if (!$exists) {
                DB::table('users')->insert([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'division_id' => $user['division_id'],
                    'id_number' => $user['id_number'],
                    'is_active' => $user['is_active'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                echo "  ✓ {$user['name']} (ID: {$user['id_number']})\n";
            }
        }

        // User random
        $names = [
            ['name' => 'Kayla Mashudini', 'id_number' => 18],
            ['name' => 'Fina Aqmei', 'id_number' => 10],
            ['name' => 'Kinandaru Pamudya', 'id_number' => 20],
            ['name' => 'Marvin Al-latif', 'id_number' => 24],
            ['name' => 'Herlambang', 'id_number' => 11],
            ['name' => 'Andi Pratama', 'id_number' => 5],
            ['name' => 'Siti Rahma', 'id_number' => 12],
            ['name' => 'Rudi Hermawan', 'id_number' => 22],
            ['name' => 'Anisa Putri', 'id_number' => 16],
        ];

        $availableDivisions = [
            $divisiManagement->id,
            $divisiMakro->id,
            $divisiProgrammer->id
        ];

        echo "✅ Seeding additional users...\n";

        foreach ($names as $data) {
            // CEK DUPLIKAT id_number
            $exists = DB::table('users')->where('id_number', $data['id_number'])->exists();
            if (!$exists) {
                DB::table('users')->insert([
                    'name' => $data['name'],
                    'email' => strtolower(str_replace(' ', '', $data['name'])) . '@example.com',
                    'division_id' => $availableDivisions[array_rand($availableDivisions)],
                    'id_number' => $data['id_number'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                echo "  ✓ {$data['name']} (ID: {$data['id_number']})\n";
            }
        }

        echo "✅ UserSeeder selesai! Total users: " . DB::table('users')->count() . "\n";
    }
}