@extends('layouts.app')

@section('title', 'Admin Dashboard - Aplikasi Piket')

@section('content')

<body class="bg-[#ABD1C6] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#004643]">Admin Dashboard</h1>
                <p class="text-gray-500">Aplikasi Piket</p>
            </div>
            <!-- TOMBOL TAMBAH JADWAL -->
            <button id="openCreateModal" class="flex items-center gap-2 px-6 py-3 bg-[#004643] text-white font-bold rounded-xl hover:bg-[#003432] transition shadow-lg">
                <span class="material-symbols-outlined">add</span>
                Tambah Jadwal
            </button>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap gap-4 mb-8">
            <button class="nav-btn px-6 py-3 bg-[#004643] text-white font-bold rounded-xl hover:bg-[#003432] transition shadow-lg" data-target="journal">
                Picket Journal
            </button>
            <button class="nav-btn px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition" data-target="users">
                Manage Users
            </button>
            <button class="nav-btn px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition" data-target="classes">
                Manage Class
            </button>
            <button class="nav-btn px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition" data-target="notifications">
                Notification
            </button>
        </div>

        <!-- Management Picket Journal Section (Default Active) -->
        <div id="journal-section" class="content-section">
            
            <!-- FILTER SECTION -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-[#004643] mb-1">Filter details...</h3>
                        <p class="text-sm text-gray-500">(cari nama, kelas, atau deskripsi)</p>
                    </div>
                    
                    <!-- Search Box -->
                    <div class="relative w-full md:w-80">
                        <input type="text" 
                            id="searchInput"
                            placeholder="Cari nama, kelas, atau deskripsi..." 
                            class="w-full px-4 py-3 pr-12 border-2 border-gray-200 rounded-xl focus:border-[#004643] focus:outline-none focus:ring-2 focus:ring-[#004643]/20 transition-all">
                        <span class="material-symbols-outlined absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            search
                        </span>
                    </div>
                </div>
            </div>

            <!-- Day Filter Tabs -->
            <div class="bg-[#004643] rounded-2xl shadow-lg p-4 mb-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <button class="day-filter px-6 py-3 bg-[#F9BC60] text-[#004643] font-bold rounded-xl hover:bg-[#F9BC60]/90 transition-all shadow-md" data-day="all">
                        SEMUA HARI
                    </button>
                    <button class="day-filter px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all" data-day="Senin">
                        SENIN
                    </button>
                    <button class="day-filter px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all" data-day="Selasa">
                        SELASA
                    </button>
                    <button class="day-filter px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all" data-day="Rabu">
                        RABU
                    </button>
                    <button class="day-filter px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all" data-day="Kamis">
                        KAMIS
                    </button>
                    <button class="day-filter px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all" data-day="Jumat">
                        JUMAT
                    </button>
                </div>
            </div>

            <!-- Week Navigation -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-6">
                <span class="text-sm font-medium text-gray-600 mr-2">Filter Minggu:</span>
                <button class="week-filter px-4 py-2 bg-[#004643] text-white font-bold rounded-xl text-sm hover:bg-[#003432] transition-all shadow-md" data-week="all">
                    Semua Minggu
                </button>
                <button class="week-filter px-4 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl text-sm hover:bg-gray-300 transition-all" data-week="Minggu Pertama">
                    Minggu Pertama
                </button>
                <button class="week-filter px-4 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl text-sm hover:bg-gray-300 transition-all" data-week="Minggu Kedua">
                    Minggu Kedua
                </button>
                <button class="week-filter px-4 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl text-sm hover:bg-gray-300 transition-all" data-week="Minggu Ketiga">
                    Minggu Ketiga
                </button>
                <button class="week-filter px-4 py-2 bg-gray-200 text-gray-700 font-bold rounded-xl text-sm hover:bg-gray-300 transition-all" data-week="Minggu Keempat">
                    Minggu Keempat
                </button>
            </div>

            <!-- ===== TABEL JADWAL PER MINGGU ===== -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#004643]">Management Picket Journal</h2>
        
        <!-- TOMBOL EXPORT EXCEL DENGAN FILTER -->
        <form action="{{ route('admin.export.excel') }}" method="GET" class="flex items-center gap-2">
            <input type="hidden" name="day" id="export-day" value="all">
            <input type="hidden" name="week" id="export-week" value="all">
            <input type="hidden" name="search" id="export-search" value="">
            <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <span class="material-symbols-outlined">download</span>
                Unduh Excel
            </button>
        </form>
    </div>

            <!-- Container untuk tabel per minggu -->
            <div id="schedules-container">
                @forelse($orderedSchedules as $weekName => $weekSchedules)
                <div class="week-section mb-8" data-week="{{ $weekName }}">
                    <!-- Header Minggu -->
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-[#004643] bg-white px-6 py-3 rounded-2xl shadow-md inline-block">
                            {{ $weekName }}
                        </h3>
                        <span class="text-sm text-gray-500">{{ count($weekSchedules) }} jadwal</span>
                    </div>
                    
                    <!-- Tabel -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-6">
                        <div class="overflow-x-auto">
                            <table class="w-full schedule-table" data-week="{{ $weekName }}">
                                <thead class="bg-[#004643]">
                                    <tr>
                                        <th class="py-4 px-4 text-white text-left">Nama</th>
                                        <th class="py-4 px-4 text-white text-left">Hari</th>
                                        <th class="py-4 px-4 text-white text-left">Tanggal</th>
                                        <th class="py-4 px-4 text-white text-left">Divisi</th>
                                        <th class="py-4 px-4 text-white text-left">Deskripsi</th>
                                        <th class="py-4 px-4 text-white text-center">Detail</th>
                                        <th class="py-4 px-4 text-white text-center">Edit</th>
                                        <th class="py-4 px-4 text-white text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($weekSchedules as $schedule)
                                    <tr class="border-b hover:bg-gray-50 transition-colors schedule-row" 
                                        data-day="{{ $schedule->day }}"
                                        data-name="{{ strtolower($schedule->user->name ?? '') }}"
                                        data-class="{{ strtolower($schedule->division->name ?? '') }}"
                                        data-description="{{ strtolower($schedule->description ?? '') }}">
                                        <td class="py-4 px-4 font-medium">{{ $schedule->user->name ?? 'Unknown' }}</td>
                                        <td class="py-4 px-4">
                                            <span class="px-3 py-1 rounded-full text-sm 
                                                @if($schedule->day == 'Senin') bg-blue-100 text-blue-600
                                                @elseif($schedule->day == 'Selasa') bg-yellow-100 text-yellow-600
                                                @elseif($schedule->day == 'Rabu') bg-green-100 text-green-600
                                                @elseif($schedule->day == 'Kamis') bg-purple-100 text-purple-600
                                                @elseif($schedule->day == 'Jumat') bg-pink-100 text-pink-600
                                                @else bg-gray-100 text-gray-600 @endif">
                                                {{ $schedule->day }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4">{{ $schedule->date->format('d/m/Y') }}</td>
                                        <td class="py-4 px-4">{{ $schedule->division->name ?? 'XII RPL' }}</td>
                                        <td class="py-4 px-4 max-w-xs truncate">{{ $schedule->description }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <button class="detail-journal-btn text-green-600 hover:text-green-800" 
                                                    data-id="{{ $schedule->id }}">
                                                <span class="material-symbols-outlined">visibility</span>
                                            </button>
                                        </td>
                                        <td class="py-4 px-4 text-center">
                                            <button class="edit-journal-btn text-blue-600 hover:text-blue-800" 
                                                    data-id="{{ $schedule->id }}">
                                                <span class="material-symbols-outlined">edit</span>
                                            </button>
                                        </td>
                                        <td class="py-4 px-4">
                                            @if($schedule->status == 'completed')
                                            <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">Done</span>
                                            @elseif($schedule->status == 'pending')
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">Pending</span>
                                            @else
                                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">Missed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 bg-white rounded-2xl shadow-xl">
                    <span class="material-symbols-outlined text-6xl text-gray-400 mb-4">info</span>
                    <p class="text-xl text-gray-600">Belum ada data jadwal</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Manage Users Section (Hidden) -->
        <div id="users-section" class="content-section hidden">
            <h2 class="text-2xl font-bold text-[#004643] mb-6">Manage Users</h2>
            <p class="text-gray-500">Fitur manage users akan ditampilkan di sini</p>
        </div>

        <!-- Manage Class Section (Hidden) -->
        <div id="classes-section" class="content-section hidden">
            <h2 class="text-2xl font-bold text-[#004643] mb-6">Manage Class</h2>
            <p class="text-gray-500">Fitur manage class akan ditampilkan di sini</p>
        </div>

        <!-- Notification Section (Hidden) -->
        <div id="notifications-section" class="content-section hidden">
            <h2 class="text-2xl font-bold text-[#004643] mb-6">Notification</h2>
            
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-white">info</span>
                        </div>
                        <div>
                            <p class="font-semibold">Jadwal Baru Ditambahkan</p>
                            <p class="text-sm text-gray-600">Jadwal piket untuk hari Senin telah ditambahkan</p>
                            <p class="text-xs text-gray-400 mt-1">5 menit yang lalu</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-green-50 rounded-xl">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-white">check_circle</span>
                        </div>
                        <div>
                            <p class="font-semibold">Laporan Disetujui</p>
                            <p class="text-sm text-gray-600">Laporan dari Nasya Tiyana telah disetujui</p>
                            <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<!-- MODALS -->
@include('components.createJadwal')
@include('components.modalDetail', ['id' => 'adminDetailModal', 'title' => 'Detail Jadwal', 'forAdmin' => true])
@include('components.editJadwal')

<style>
/* Section transition */
.content-section {
    transition: all 0.3s ease;
}
.hidden {
    display: none;
}
.nav-btn.active {
    background-color: #004643;
    color: white;
    box-shadow: 0 10px 15px -3px rgba(0, 70, 67, 0.3);
}
.week-section {
    transition: all 0.3s ease;
}
.schedule-row {
    transition: background-color 0.2s ease;
}
.day-filter.active {
    background-color: #F9BC60 !important;
    color: #004643 !important;
    box-shadow: 0 4px 12px rgba(249, 188, 96, 0.3);
}
.week-filter.active {
    background-color: #004643 !important;
    color: white !important;
    box-shadow: 0 4px 12px rgba(0, 70, 67, 0.3);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ==================== FILTER ====================
    const searchInput = document.getElementById('searchInput');
    const dayFilters = document.querySelectorAll('.day-filter');
    const weekFilters = document.querySelectorAll('.week-filter');
    const scheduleRows = document.querySelectorAll('.schedule-row');
    const weekSections = document.querySelectorAll('.week-section');
    
    let currentDay = 'all';
    let currentWeek = 'all';
    let currentSearch = '';
    
    function filterTables() {
        let visibleCount = 0;
        
        scheduleRows.forEach(row => {
            const rowDay = row.dataset.day;
            const rowWeek = row.closest('.week-section').dataset.week;
            const rowName = row.dataset.name || '';
            const rowClass = row.dataset.class || '';
            const rowDesc = row.dataset.description || '';
            
            const dayMatch = currentDay === 'all' || rowDay === currentDay;
            const weekMatch = currentWeek === 'all' || rowWeek === currentWeek;
            const searchMatch = currentSearch === '' || 
                rowName.includes(currentSearch) || 
                rowClass.includes(currentSearch) || 
                rowDesc.includes(currentSearch);
            
            if (dayMatch && weekMatch && searchMatch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        weekSections.forEach(section => {
            const hasVisibleRows = Array.from(section.querySelectorAll('.schedule-row'))
                .some(row => row.style.display !== 'none');
            
            if (currentWeek === 'all' || section.dataset.week === currentWeek) {
                section.style.display = hasVisibleRows ? '' : 'none';
            } else {
                section.style.display = 'none';
            }
        });
        
        updateResultInfo(visibleCount);
    }
    
    function updateResultInfo(count) {
        let infoElement = document.getElementById('result-info');
        if (!infoElement) {
            infoElement = document.createElement('div');
            infoElement.id = 'result-info';
            infoElement.className = 'text-sm text-gray-500 mt-4 text-center';
            document.getElementById('schedules-container').after(infoElement);
        }
        infoElement.textContent = `Menampilkan ${count} jadwal`;
    }
    
    // Filter hari
    dayFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            dayFilters.forEach(f => {
                f.classList.remove('bg-[#F9BC60]', 'text-[#004643]', 'shadow-md');
                f.classList.add('bg-white/20', 'text-white');
            });
            this.classList.remove('bg-white/20', 'text-white');
            this.classList.add('bg-[#F9BC60]', 'text-[#004643]', 'shadow-md');
            currentDay = this.dataset.day;
            filterTables();
        });
    });
    
    // Filter minggu
    weekFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            weekFilters.forEach(f => {
                f.classList.remove('bg-[#004643]', 'text-white', 'shadow-md');
                f.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('bg-[#004643]', 'text-white', 'shadow-md');
            currentWeek = this.dataset.week;
            filterTables();
        });
    });
    
    // Search
    searchInput.addEventListener('input', function() {
        currentSearch = this.value.toLowerCase().trim();
        filterTables();
    });
    
    // ==================== TAB NAVIGATION ====================
    const navBtns = document.querySelectorAll('.nav-btn');
    const sections = document.querySelectorAll('.content-section');
    
    navBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            navBtns.forEach(b => {
                b.classList.remove('active', 'bg-[#004643]', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('active', 'bg-[#004643]', 'text-white');
            
            sections.forEach(section => section.classList.add('hidden'));
            const target = this.dataset.target;
            document.getElementById(target + '-section').classList.remove('hidden');
        });
    });
    


// Update nilai hidden input sebelum submit export
const exportForm = document.querySelector('form[action*="export-excel"]');
if (exportForm) {
    // Update sebelum submit
    exportForm.addEventListener('submit', function() {
        document.getElementById('export-day').value = currentDay;
        document.getElementById('export-week').value = currentWeek;
        document.getElementById('export-search').value = currentSearch;
    });
}

    // ==================== MODAL CREATE ====================
    const openCreateBtn = document.getElementById('openCreateModal');
    const createModal = document.getElementById('createScheduleModal');
    const closeCreateBtns = document.querySelectorAll('.close-create-modal');
    
    if (openCreateBtn && createModal) {
        openCreateBtn.addEventListener('click', function() {
            createModal.classList.remove('hidden');
            createModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });
    }
    
    closeCreateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            createModal.classList.remove('flex');
            createModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    });
    
    // Auto-fill day
    const createDate = document.getElementById('create-date');
    if (createDate) {
        createDate.addEventListener('change', function() {
            const date = new Date(this.value);
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[date.getDay()];
            document.getElementById('create-day').value = dayName;
            document.getElementById('preview-date').textContent = this.value;
            document.getElementById('preview-day').textContent = dayName;
        });
    }
    
    // ==================== MODAL EDIT ====================
const editButtons = document.querySelectorAll('.edit-journal-btn');
const editModal = document.getElementById('editScheduleForm');

if (editButtons.length > 0 && editModal) {
    editButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const scheduleId = this.dataset.id;
            console.log('Edit button clicked, ID:', scheduleId); // Debug
            
            if (!scheduleId) {
                alert('ID Jadwal tidak ditemukan');
                return;
            }
            
            // Tampilkan modal
            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            // Fetch data
            fetch(`/admin/journal/${scheduleId}/edit`)
                .then(response => {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(data => {
                    console.log('Data received:', data); // Debug
                    
                    // Isi form dengan data
                    document.getElementById('edit-name').value = data.name || '';
                    document.getElementById('edit-no').value = data.no || '';
                    document.getElementById('edit-class').value = data.class || '';
                    document.getElementById('edit-date').value = data.date || '';
                    document.getElementById('edit-location').value = data.location || '';
                    document.getElementById('edit-description').value = data.description || '';
                    document.getElementById('edit-start-time').value = data.start_time || '07:00';
                    document.getElementById('edit-end-time').value = data.end_time || '08:00';
                    document.getElementById('edit-schedule-id').value = scheduleId;
                    
                    // Set day select
                    const daySelect = document.getElementById('edit-day');
                    for (let option of daySelect.options) {
                        if (option.text === data.day) {
                            option.selected = true;
                            break;
                        }
                    }
                    
                    // Set status radio
                    if (data.status === 'Done') {
                        document.getElementById('edit-status-done').checked = true;
                    } else {
                        document.getElementById('edit-status-pending').checked = true;
                    }
                    
                    // Update ID display
                    document.getElementById('editScheduleId').textContent = `ID: PKT-2026-${String(data.id).padStart(3, '0')}`;
                    editModal.dataset.currentId = scheduleId;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat data jurnal');
                    editModal.classList.add('hidden');
                });
        });
    });
}

// ==================== SAVE EDIT ====================
const editForm = document.getElementById('editJournalForm');
if (editForm) {
    editForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const scheduleId = editModal.dataset.currentId;
        
        if (!scheduleId) {
            alert('ID Jadwal tidak ditemukan');
            return;
        }
        
        const formData = {
            date: document.getElementById('edit-date').value,
            day: document.getElementById('edit-day').value,
            location: document.getElementById('edit-location').value,
            description: document.getElementById('edit-description').value,
            start_time: document.getElementById('edit-start-time').value,
            end_time: document.getElementById('edit-end-time').value,
            status: document.querySelector('input[name="edit-status"]:checked')?.value === 'Done' ? 'completed' : 'pending'
        };
        
        fetch(`/admin/schedules/${scheduleId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Jadwal berhasil diupdate');
                location.reload();
            } else {
                alert('Gagal: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    });
}
    
    // ==================== APPROVE/REJECT (HANYA SATU KALI) ====================
    const approveButtons = document.querySelectorAll('.approve-btn');
    const rejectButtons = document.querySelectorAll('.reject-btn');
    
    function handleApproveReject(url, action) {
        return function() {
            const scheduleId = this.dataset.id;
            if (!scheduleId) {
                alert('ID Jadwal tidak ditemukan');
                return;
            }
            if (confirm(`${action} laporan ini?`)) {
                fetch(url.replace('{id}', scheduleId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`Laporan ${action.toLowerCase()}`);
                        location.reload();
                    } else {
                        alert('Gagal: ' + data.message);
                    }
                })
                .catch(() => alert('Terjadi kesalahan'));
            }
        };
    }
    
    approveButtons.forEach(btn => {
        btn.addEventListener('click', handleApproveReject('/admin/reports/{id}/approve', 'Setujui'));
    });
    
    rejectButtons.forEach(btn => {
        btn.addEventListener('click', handleApproveReject('/admin/reports/{id}/reject', 'Tolak'));
    });
    
    // ==================== DETAIL BUTTON ====================
// ==================== DETAIL BUTTON ====================
const detailButtons = document.querySelectorAll('.detail-journal-btn');
const adminModal = document.getElementById('adminDetailModal');

detailButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        const scheduleId = this.dataset.id;
        
        if (!scheduleId) {
            alert('ID Jadwal tidak ditemukan');
            return;
        }
        
        // Tampilkan modal
        adminModal.classList.remove('hidden');
        adminModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Fetch data detail
        fetch(`/admin/journal/${scheduleId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Data detail:', data);
                
                // Update konten modal - PERHATIKAN SUFFIX -adminDetailModal
                document.getElementById('modalLocation-adminDetailModal').textContent = data.location || '-';
                document.getElementById('modalDate-adminDetailModal').textContent = data.date || '-';
                
                const statusElement = document.getElementById('modalStatus-adminDetailModal');
                statusElement.textContent = data.status === 'Done' ? 'Selesai' : 'Pending';
                statusElement.className = data.status === 'Done' ? 
                    'text-lg font-bold text-green-600' : 'text-lg font-bold text-[#F9BC60]';
                
                document.getElementById('modalTime-adminDetailModal').textContent = 
                    (data.start_time || '07:00') + ' - ' + (data.end_time || '08:00') + ' WIB';
                
                document.getElementById('modalDescription-adminDetailModal').textContent = data.description || '-';
                document.getElementById('modalScheduleId-adminDetailModal').textContent = `ID: PKT-2026-${String(data.id).padStart(3, '0')}`;
                
                // Update foto sebelum
                const photoBefore = document.getElementById('photoBeforeContainer-adminDetailModal');
                const photoBeforeStatus = document.getElementById('photoBeforeStatus-adminDetailModal');
                
                if (data.photo_before) {
                    photoBefore.innerHTML = `<img src="${data.photo_before}" class="w-full h-full object-cover">`;
                    photoBeforeStatus.textContent = '✓ Foto terupload';
                    photoBeforeStatus.className = 'text-sm text-green-600 mt-2 text-center';
                } else {
                    photoBefore.innerHTML = '<span class="material-symbols-outlined text-6xl text-gray-300">image</span>';
                    photoBeforeStatus.textContent = 'Belum ada foto';
                    photoBeforeStatus.className = 'text-sm text-gray-500 mt-2 text-center';
                }
                
                // Update foto sesudah
                const photoAfter = document.getElementById('photoAfterContainer-adminDetailModal');
                const photoAfterStatus = document.getElementById('photoAfterStatus-adminDetailModal');
                
                if (data.photo_after) {
                    photoAfter.innerHTML = `<img src="${data.photo_after}" class="w-full h-full object-cover">`;
                    photoAfterStatus.textContent = '✓ Foto terupload';
                    photoAfterStatus.className = 'text-sm text-green-600 mt-2 text-center';
                } else {
                    photoAfter.innerHTML = '<span class="material-symbols-outlined text-6xl text-gray-300">image</span>';
                    photoAfterStatus.textContent = 'Belum ada foto';
                    photoAfterStatus.className = 'text-sm text-gray-500 mt-2 text-center';
                }
                
                // Set data-id di tombol approve/reject
                document.querySelectorAll('#adminDetailModal .approve-btn, #adminDetailModal .reject-btn').forEach(btn => {
                    btn.dataset.id = scheduleId;
                });
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal memuat detail jadwal');
                adminModal.classList.add('hidden');
            });
    });
});
    });
</script>
@endsection