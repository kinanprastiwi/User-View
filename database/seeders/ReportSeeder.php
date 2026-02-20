<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil schedule yang completed
        $completedSchedules = DB::table('schedules')
            ->where('status', 'completed')
            ->limit(3)
            ->get();

        foreach ($completedSchedules as $schedule) {
            $user = DB::table('users')->where('id', $schedule->user_id)->first();
            
            DB::table('reports')->insert([
                'schedule_id' => $schedule->id,
                'user_id' => $schedule->user_id,
                'date' => $schedule->date,
                'day' => $schedule->day,
                'activity_description' => 'Telah melaksanakan ' . $schedule->description,
                'photo_before' => null,
                'photo_after' => null,
                'notes' => 'Laporan selesai',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}