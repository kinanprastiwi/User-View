<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->get();
        
        foreach ($users as $user) {
            DB::table('notifications')->insert([
                [
                    'user_id' => $user->id,
                    'title' => 'Jadwal Piket Baru',
                    'message' => 'Anda mendapat jadwal piket tanggal 5 Januari 2026',
                    'type' => 'info',
                    'is_read' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $user->id,
                    'title' => 'Pengingat Piket',
                    'message' => 'Jangan lupa piket besok!',
                    'type' => 'warning',
                    'is_read' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
            
            // Hanya 1 notifikasi per user (break setelah 1)
            break;
        }
    }
}