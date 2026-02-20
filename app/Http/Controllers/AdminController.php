<?php

namespace App\Http\Controllers;

use App\Exports\SchedulesExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Report;
use App\Models\Division;
use App\Models\Notification;

class AdminController extends Controller
{
    // ================ DASHBOARD ================
   public function dashboard()
{
    // Ambil semua jadwal dengan relasi
    $schedules = Schedule::with(['user', 'division', 'report'])->get();
    
    // Kelompokkan jadwal per minggu
    $groupedSchedules = [];
    foreach ($schedules as $schedule) {
        $weekNumber = $this->getWeekNumber($schedule->date);
        $weekName = $this->getWeekName($weekNumber);
        
        if (!isset($groupedSchedules[$weekName])) {
            $groupedSchedules[$weekName] = [];
        }
        $groupedSchedules[$weekName][] = $schedule;
    }
    
    // Urutkan minggu (Minggu Pertama, Kedua, dll)
    $weekOrder = ['Minggu Pertama', 'Minggu Kedua', 'Minggu Ketiga', 'Minggu Keempat', 'Minggu Kelima'];
    $orderedSchedules = [];
    foreach ($weekOrder as $week) {
        if (isset($groupedSchedules[$week])) {
            $orderedSchedules[$week] = $groupedSchedules[$week];
        }
    }
    
    $users = User::all();
    $divisions = Division::all();
    
    $totalUsers = User::count();
    $totalSchedules = Schedule::count();
    $pendingSchedules = Schedule::where('status', 'pending')->count();
    $completedSchedules = Schedule::where('status', 'completed')->count();
    
    return view('admin.dashboard', compact(
        'orderedSchedules',
        'users',
        'divisions',
        'totalUsers',
        'totalSchedules',
        'pendingSchedules',
        'completedSchedules'
    ));
}

private function getWeekNumber($date)
{
    $dayOfMonth = $date->day;
    return ceil($dayOfMonth / 7);
}

private function getWeekName($weekNumber)
{
    $weeks = [
        1 => 'Minggu Pertama',
        2 => 'Minggu Kedua',
        3 => 'Minggu Ketiga',
        4 => 'Minggu Keempat',
        5 => 'Minggu Kelima'
    ];
    return $weeks[$weekNumber] ?? 'Minggu Lainnya';
}
    // API untuk mengambil detail jadwal (termasuk foto)
    // Route: /admin/journal/{id}/edit
public function getJournal($id)
{
    try {
        $schedule = Schedule::with(['user', 'division', 'report'])->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'id' => $schedule->id,
            'name' => $schedule->user->name ?? '',
            'no' => $schedule->user->id_number ?? '',
            'class' => $schedule->division->name ?? '',
            'description' => $schedule->description ?? '',
            'day' => $schedule->day ?? '',
            'date' => $schedule->date ? $schedule->date->format('Y-m-d') : '',
            'status' => $schedule->status === 'completed' ? 'Done' : 'Pending', // <-- INI PENTING
            'photo_before' => $schedule->report && $schedule->report->photo_before 
                ? asset('storage/' . $schedule->report->photo_before) 
                : null,
            'photo_after' => $schedule->report && $schedule->report->photo_after 
                ? asset('storage/' . $schedule->report->photo_after) 
                : null,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }
}

public function updateJournal(Request $request, $id)
{
    try {
        $schedule = Schedule::findOrFail($id);
        
        $validated = $request->validate([
            'description' => 'required|string',
            'day' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|in:Done,Pending'
        ]);
        
        $schedule->update([
            'description' => $request->description,
            'day' => $request->day,
            'date' => $request->date,
            'status' => $request->status === 'Done' ? 'completed' : 'pending'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Jurnal berhasil diupdate'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal update: ' . $e->getMessage()
        ], 500);
    }
}

    // ================ USERS MANAGEMENT ================
    public function usersIndex()
    {
        $users = User::with('division')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    
    public function usersCreate()
    {
        $divisions = Division::all();
        return view('admin.users.create', compact('divisions'));
    }
    
    public function usersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nis' => 'required|unique:users',
            'division_id' => 'required|exists:divisions,id',
            'absen_number' => 'required|unique:users',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable',
        ]);
        
        User::create($validated);
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan');
    }
    
    public function usersEdit($id)
    {
        $user = User::findOrFail($id);
        $divisions = Division::all();
        return view('admin.users.edit', compact('user', 'divisions'));
    }
    
    public function usersUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required',
            'nis' => 'required|unique:users,nis,' . $id,
            'division_id' => 'required|exists:divisions,id',
            'absen_number' => 'required|unique:users,absen_number,' . $id,
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone' => 'nullable',
            'is_active' => 'boolean',
        ]);
        
        $user->update($validated);
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui');
    }
    
    public function usersDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus');
    }
    
   // ================ SCHEDULES MANAGEMENT ================
public function schedulesIndex()
{
    $schedules = Schedule::with('user', 'division')->paginate(10);
    return view('admin.schedules.index', compact('schedules'));
}

public function schedulesCreate()
{
    $users = User::all();
    $divisions = Division::all();
    return view('admin.schedules.create', compact('users', 'divisions'));
}

// CREATE - Menyimpan jadwal baru
public function schedulesStore(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'division_id' => 'required|exists:divisions,id',
        'date' => 'required|date',
        'day' => 'required',
        'location' => 'required',
        'description' => 'nullable',
        'start_time' => 'required',
        'end_time' => 'required',
        'status' => 'required|in:pending,completed',
    ]);
    
    Schedule::create($validated);
    
    return redirect()->route('admin.dashboard')->with('success', 'Jadwal berhasil ditambahkan');
}

// UPDATE - Mengupdate jadwal yang ada
public function schedulesUpdate(Request $request, $id)
{
    try {
        $schedule = Schedule::findOrFail($id);
        
        $validated = $request->validate([
            'date' => 'required|date',
            'day' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in:pending,completed',
        ]);
        
        $schedule->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Jadwal berhasil diperbarui'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal: ' . $e->getMessage()
        ], 500);
    }
}

public function schedulesEdit($id)
{
    $schedule = Schedule::findOrFail($id);
    $users = User::all();
    $divisions = Division::all();
    return view('admin.schedules.edit', compact('schedule', 'users', 'divisions'));
}



public function schedulesDestroy($id)
{
    $schedule = Schedule::findOrFail($id);
    $schedule->delete();
    
    return redirect()->route('admin.schedules.index')
        ->with('success', 'Jadwal berhasil dihapus');
}

    // ================ REPORTS MANAGEMENT ================
    public function reportsIndex()
    {
        $reports = Report::with('user', 'schedule')->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }
    
    public function reportsShow($id)
    {
        $report = Report::with('user', 'schedule')->findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }
    
    public function reportsApprove($id)
{
    try {
        // Cari report berdasarkan schedule_id
        $report = Report::where('schedule_id', $id)->first();
        
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan tidak ditemukan'
            ], 404);
        }
        
        $report->update(['status' => 'approved']);
        
        // Update juga status jadwal menjadi completed
        $schedule = Schedule::find($id);
        if ($schedule) {
            $schedule->update(['status' => 'completed']);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Laporan disetujui'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal: ' . $e->getMessage()
        ], 500);
    }
}

public function reportsReject($id)
{
    try {
        $report = Report::where('schedule_id', $id)->first();
        
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan tidak ditemukan'
            ], 404);
        }
        
        $report->update(['status' => 'rejected']);
        
        return response()->json([
            'success' => true,
            'message' => 'Laporan ditolak'
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal: ' . $e->getMessage()
        ], 500);
    }
}


// ================ EXPORT EXCEL ================
public function exportExcel(Request $request)
{
    try {
        $query = Schedule::with(['user', 'division']);
        
        // Filter berdasarkan minggu jika ada
        if ($request->has('week') && $request->week != 'all') {
            // Logika filter minggu sesuai kebutuhan
        }
        
        // Filter berdasarkan hari jika ada
        if ($request->has('day') && $request->day != 'all') {
            $query->where('day', $request->day);
        }
        
        // Filter berdasarkan search jika ada
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('division', function($divQuery) use ($search) {
                    $divQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
            });
        }
        
        $schedules = $query->get();
        
        $fileName = 'jadwal-piket-' . date('Y-m-d-His') . '.xlsx';
        
        return Excel::download(new SchedulesExport($schedules), $fileName);
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal export: ' . $e->getMessage());
    }
}
    
    // ================ DIVISIONS MANAGEMENT ================
    public function divisionsIndex()
    {
        $divisions = Division::withCount('users')->paginate(10);
        return view('admin.divisions.index', compact('divisions'));
    }
    
    public function divisionsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:divisions',
            'description' => 'nullable',
        ]);
        
        Division::create($validated);
        
        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil ditambahkan');
    }
    
    public function divisionsUpdate(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|unique:divisions,name,' . $id,
            'description' => 'nullable',
        ]);
        
        $division->update($validated);
        
        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil diperbarui');
    }
    
    public function divisionsDestroy($id)
    {
        $division = Division::findOrFail($id);
        $division->delete();
        
        return redirect()->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil dihapus');
    }
    
    // ================ NOTIFICATIONS ================
    public function notificationsCreate()
    {
        return view('admin.notifications.create');
    }
    
    public function notificationsSend(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'message' => 'required',
            'type' => 'required|in:info,success,warning,error',
            'send_to' => 'required|in:all,selected',
            'user_ids' => 'required_if:send_to,selected|array',
        ]);
        
        if ($request->send_to === 'all') {
            $users = User::all();
            foreach ($users as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'title' => $request->title,
                    'message' => $request->message,
                    'type' => $request->type,
                ]);
            }
        } else {
            foreach ($request->user_ids as $userId) {
                Notification::create([
                    'user_id' => $userId,
                    'title' => $request->title,
                    'message' => $request->message,
                    'type' => $request->type,
                ]);
            }
        }
        
        return redirect()->back()->with('success', 'Notifikasi berhasil dikirim');
    }
    
    // ================ STATISTICS ================
    public function stats()
    {
        $usersByDivision = Division::withCount('users')->get();
        $schedulesByStatus = [
            'pending' => Schedule::where('status', 'pending')->count(),
            'completed' => Schedule::where('status', 'completed')->count(),
            'missed' => Schedule::where('status', 'missed')->count(),
        ];
        
        return view('admin.stats.index', compact('usersByDivision', 'schedulesByStatus'));
    }
    
    // ================ EXPORT ================
    public function export()
    {
        // Implementasi export ke Excel/PDF
        return redirect()->back()->with('info', 'Fitur export sedang dalam pengembangan');
    }
}