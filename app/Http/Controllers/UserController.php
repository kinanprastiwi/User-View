<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Report;
use App\Models\Notification;


class UserController extends Controller
{
    private function getActiveUserId()
    {
        // Cek dulu apakah ada session
    if (session()->has('active_user_id')) {
        return session('active_user_id');
    }
    
    // Default ke Budi (ID 14)
    return 14;
    }

    public function dashboard()
{
    $userId = $this->getActiveUserId(); // 14 untuk Budi
    
    // Ambil data user
    $user = User::with('division')->find($userId);
    
    if (!$user) {
        return redirect('/set-user/14')->with('error', 'User tidak ditemukan');
    }
    
    // Ambil jadwal aktif
    $activeSchedule = Schedule::with(['user', 'division', 'report'])
                        ->where('user_id', $userId)
                        ->where('status', 'pending')
                        ->orderBy('date', 'asc')
                        ->first();
    
    // Jika tidak ada jadwal, buat satu (untuk testing)
    if (!$activeSchedule) {
        $activeSchedule = Schedule::create([
            'user_id' => $userId,
            'division_id' => $user->division_id ?? 1,
            'date' => now()->addDays(1),
            'day' => now()->addDays(1)->format('l'),
            'start_time' => '07:00:00',
            'end_time' => '08:00:00',
            'location' => 'Ruang IT - Lantai 2',
            'description' => 'Piket Ruang IT',
            'status' => 'pending'
        ]);
    }
    
    // Ambil notifikasi
    $notifications = Notification::where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();
    
    $unreadCount = Notification::where('user_id', $userId)
                        ->where('is_read', false)
                        ->count();
    
    // ===== TAMBAHKAN INI - Data untuk tabel notifikasi =====
    $recentNotifications = [];
    
    // Jika ada notifikasi dari database, gunakan itu
    foreach ($notifications as $notif) {
        $recentNotifications[] = (object)[
            'jenis' => $notif->type == 'info' ? 'Informasi' : 'Pemberitahuan',
            'jenis_desc' => $notif->title,
            'status_title' => $notif->title,
            'status_desc' => $notif->message,
            'tanggal' => $notif->created_at->format('d/m/Y')
        ];
    }
    
    // Jika tidak ada notifikasi, gunakan data dummy
    if (empty($recentNotifications)) {
        $recentNotifications = [
            (object)[
                'jenis' => 'Jadwal Baru',
                'jenis_desc' => 'Pemberitahuan jadwal',
                'status_title' => 'Jadwal Piket Baru',
                'status_desc' => 'Anda mendapat jadwal piket tanggal 5 Januari 2026',
                'tanggal' => '5/1/2026'
            ],
            (object)[
                'jenis' => 'Laporan',
                'jenis_desc' => 'Status laporan',
                'status_title' => 'Laporan Disetujui',
                'status_desc' => 'Laporan piket Anda telah disetujui',
                'tanggal' => '4/1/2026'
            ]
        ];
    }
    
    // Statistik
    $totalJadwal = Schedule::where('user_id', $userId)->count();
    $selesai = Schedule::where('user_id', $userId)->where('status', 'completed')->count();
    $pending = Schedule::where('user_id', $userId)->where('status', 'pending')->count();
    
    return view('user.dashboard', compact(
        'user',
        'activeSchedule',
        'notifications',
        'unreadCount',
        'recentNotifications', // PASTIKAN INI ADA
        'totalJadwal',
        'selesai',
        'pending'
    ));
}

   public function uploadFoto(Request $request)
{
    try {
        $request->validate([
            'photo' => 'required|image|max:5120',
            'type' => 'required|in:before,after',
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        $userId = $this->getActiveUserId();
        $scheduleId = $request->schedule_id;
        
        $schedule = Schedule::where('id', $scheduleId)
                            ->where('user_id', $userId)
                            ->first();
        
        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan atau bukan milik Anda'
            ], 403);
        }

        // Simpan foto
        $path = $request->file('photo')->store('uploads/' . $request->type, 'public');
        
        // Cari atau buat report
        $report = Report::updateOrCreate(
            ['schedule_id' => $scheduleId],
            [
                'user_id' => $userId,
                'date' => $schedule->date,
                'day' => $schedule->day,
                'activity_description' => 'Menunggu deskripsi',
                $request->type === 'before' ? 'photo_before' : 'photo_after' => $path
            ]
        );

        // CEK APAKAH KEDUA FOTO SUDAH DIUPLOAD
        $report->refresh(); // Refresh data
        
        // Jika kedua foto sudah diupload, otomatis tandai selesai
        if ($report->photo_before && $report->photo_after) {
            $schedule->update(['status' => 'completed']);
            $report->update(['status' => 'approved']);
            
            return response()->json([
                'success' => true,
                'message' => 'Foto berhasil diupload. Jadwal otomatis ditandai selesai!',
                'url' => asset('storage/' . $path),
                'status_updated' => true,
                'new_status' => 'Selesai'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Foto berhasil diupload',
            'url' => asset('storage/' . $path),
            'status_updated' => false
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal upload: ' . $e->getMessage()
        ], 500);
    }
}

    public function jadwal()
    {
        $userId = $this->getActiveUserId();
        $user = User::with('division')->find($userId);
        
        if (!$user) {
            $user = (object)['name' => 'Budi Santoso'];
            $divisionName = 'Divisi MA';
        } else {
            $divisionName = $user->division->name ?? 'Divisi MA';
        }
        
        // Ambil jadwal REAL dari database
        $schedules = Schedule::where('user_id', $userId)
                            ->with('division')
                            ->orderBy('date', 'desc')
                            ->get();
        
        $jadwalData = [];
        foreach ($schedules as $schedule) {
            $jadwalData[] = [
                'tanggal' => $schedule->date->format('d/m/Y'),
                'hari' => $schedule->day,
                'absen' => $user->id_number ?? rand(1, 30),
                'nama' => $user->name,
                'status' => $schedule->status === 'completed' ? 'Selesai' : 
                           ($schedule->status === 'pending' ? 'Belum Selesai' : $schedule->status),
                'week' => ceil($schedule->date->format('d') / 7)
            ];
        }
        
        // Jika tidak ada jadwal, gunakan dummy
        if (empty($jadwalData)) {
            $jadwalData = [
                ['tanggal' => '01/02/2026', 'hari' => 'Senin', 'absen' => 18, 'nama' => 'Kayla Mashudini', 'status' => 'Selesai', 'week' => 1],
            ];
        }
        
        $weeks = [
            ['name' => 'Minggu Pertama', 'period' => '01 - 07 Februari 2026', 'week' => 1],
            ['name' => 'Minggu Kedua', 'period' => '08 - 14 Februari 2026', 'week' => 2],
        ];
        
        return view('user.jadwal', compact('user', 'divisionName', 'jadwalData', 'weeks'));
    }

    public function laporan()
    {
        $userId = $this->getActiveUserId();
        $user = User::with('division')->find($userId);
        
        if (!$user) {
            $user = (object)['name' => 'Budi Santoso'];
            $divisionName = 'Divisi MA';
        } else {
            $divisionName = $user->division->name ?? 'Divisi MA';
        }
        
        // Ambil laporan REAL dari database
        $reports = Report::where('user_id', $userId)
                        ->with('schedule')
                        ->orderBy('date', 'desc')
                        ->get();
        
        $laporanData = [];
        foreach ($reports as $report) {
            $laporanData[] = [
                'tanggal' => $report->date->format('d/m/Y'),
                'hari' => $report->day,
                'absen' => $user->id_number ?? rand(1, 30),
                'nama' => $user->name,
                'deskripsi' => $report->activity_description,
                'status' => $report->status === 'approved' ? 'Selesai' : 
                           ($report->status === 'pending' ? 'Belum Selesai' : $report->status),
                'week' => ceil($report->date->format('d') / 7)
            ];
        }
        
        // Jika tidak ada laporan, gunakan dummy
        if (empty($laporanData)) {
            $laporanData = [
                ['tanggal' => '01/02/2026', 'hari' => 'Senin', 'absen' => 18, 'nama' => 'Kayla Mashudini', 'deskripsi' => 'Membersihkan papan tulis', 'status' => 'Selesai', 'week' => 1],
            ];
        }
        
        $weeks = [
            ['name' => 'Minggu Pertama', 'period' => '01 - 07 Februari 2026', 'week' => 1],
        ];
        
        return view('user.laporan', compact('user', 'divisionName', 'laporanData', 'weeks'));
    }

    public function getScheduleDetail($scheduleId)
{
    try {
        $userId = $this->getActiveUserId();
        
        $schedule = Schedule::with(['user', 'division', 'report'])
                    ->where('id', $scheduleId)
                    ->where('user_id', $userId)
                    ->first();
        
        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $schedule->id,
                'location' => $schedule->location,
                'date' => $schedule->date->format('d F Y'),
                'status' => $schedule->status === 'pending' ? 'Pending' : 
                           ($schedule->status === 'completed' ? 'Selesai' : $schedule->status),
                'start_time' => $schedule->start_time,
                'end_time' => $schedule->end_time,
                'description' => $schedule->description,
                'photo_before' => $schedule->report && $schedule->report->photo_before 
                    ? asset('storage/' . $schedule->report->photo_before) 
                    : null,
                'photo_after' => $schedule->report && $schedule->report->photo_after 
                    ? asset('storage/' . $schedule->report->photo_after) 
                    : null,
            ]
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}
    public function storeLaporan(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'Laporan disimpan']);
    }

    // ================ KONFIRMASI JADWAL ================
public function konfirmasiJadwal(Request $request)
{
    try {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id'
        ]);

        $userId = $this->getActiveUserId();
        $scheduleId = $request->schedule_id;
        
        // Cek apakah jadwal milik user yang bersangkutan
        $schedule = Schedule::where('id', $scheduleId)
                            ->where('user_id', $userId)
                            ->first();
        
        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan atau bukan milik Anda'
            ], 403);
        }
        
        // Update status jadwal menjadi completed
        $schedule->update(['status' => 'completed']);
        
        // Update atau buat report dengan status approved
        $report = Report::updateOrCreate(
            ['schedule_id' => $scheduleId],
            [
                'user_id' => $userId,
                'date' => $schedule->date,
                'day' => $schedule->day,
                'activity_description' => 'Jadwal telah diselesaikan',
                'status' => 'approved'
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil ditandai selesai',
            'new_status' => 'Selesai'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal: ' . $e->getMessage()
        ], 500);
    }
}


};