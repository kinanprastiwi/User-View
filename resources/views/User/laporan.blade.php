@extends('layouts.app')

@section('title', 'Laporan Piket - Aplikasi Piket')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Header dengan Kelas dan Profile Dropdown -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-12">
        <!-- Kelas -->
        <div class="flex items-center gap-4 w-full lg:w-auto justify-center lg:justify-start">
            <div class="bg-white px-8 py-5 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-4xl font-bold text-[#004643] text-center lg:text-left">
                    XII RPL
                </h2>
            </div>
        </div>

       
            <!-- Dropdown Menu -->
            <div id="profileMenu" class="absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl border border-gray-200 z-50 hidden">
                <div class="p-5 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#004643] to-[#00665f] rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-3xl">person</span>
                        </div>
                        <div>
                            <p class="font-bold text-[#004643] text-xl">Budi Santoso</p>
                            <p class="text-gray-500 text-sm">budi@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <a href="#" class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-all">
                        <span class="material-symbols-outlined text-[#004643]">account_circle</span>
                        <span class="font-medium text-gray-700">Profil Saya</span>
                    </a>
                    <a href="#" class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-all">
                        <span class="material-symbols-outlined text-[#004643]">settings</span>
                        <span class="font-medium text-gray-700">Pengaturan</span>
                    </a>
                    <div class="border-t border-gray-100 my-2"></div>
                    <a href="#" id="logoutBtn" class="flex items-center gap-4 p-3 hover:bg-red-50 rounded-xl transition-all">
                        <span class="material-symbols-outlined text-red-500">logout</span>
                        <span class="font-medium text-red-500">Keluar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Halaman -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-bold text-[#004643] mb-4">Laporan Piket</h1>
        <p class="text-gray-600 text-lg">Kelola dan pantau laporan piket harian Anda</p>
    </div>

    <!-- Filter Section -->
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
            <button class="day-filter px-8 py-4 bg-[#F9BC60] text-[#004643] font-bold rounded-xl hover:bg-[#F9BC60]/90 transition-all shadow-md text-lg" data-day="all">
                SEMUA
            </button>
            <button class="day-filter px-8 py-4 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all text-lg" data-day="Senin">
                SENIN
            </button>
            <button class="day-filter px-8 py-4 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all text-lg" data-day="Selasa">
                SELASA
            </button>
            <button class="day-filter px-8 py-4 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all text-lg" data-day="Rabu">
                RABU
            </button>
            <button class="day-filter px-8 py-4 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all text-lg" data-day="Kamis">
                KAMIS
            </button>
            <button class="day-filter px-8 py-4 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-all text-lg" data-day="Jumat">
                JUMAT
            </button>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <!-- Minggu Dropdown -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-6 mb-8">
            <div class="relative w-full sm:w-auto" id="weekDropdown">
                <div class="flex items-center justify-between gap-4 bg-gray-100 px-6 py-4 rounded-xl cursor-pointer hover:bg-gray-200 transition-all w-full sm:w-64" id="weekButton">
                    <span id="selectedWeek" class="font-bold text-[#004643] text-lg">Minggu Pertama</span>
                    <span class="material-symbols-outlined text-[#004643] transition-transform duration-300" id="weekArrow">
                        expand_more
                    </span>
                </div>
                
                <!-- Minggu Dropdown Menu -->
                <div id="weekMenu" class="absolute left-0 mt-2 w-full bg-white rounded-xl shadow-2xl border border-gray-200 z-40 hidden">
                    <div class="p-2">
                        <a href="#" class="week-option block px-4 py-3 hover:bg-gray-50 rounded-lg transition-all font-medium text-gray-700" data-week="1" data-period="01 - 07 Februari 2026">
                            Minggu Pertama
                        </a>
                        <a href="#" class="week-option block px-4 py-3 hover:bg-gray-50 rounded-lg transition-all font-medium text-gray-700" data-week="2" data-period="08 - 14 Februari 2026">
                            Minggu Kedua
                        </a>
                        <a href="#" class="week-option block px-4 py-3 hover:bg-gray-50 rounded-lg transition-all font-medium text-gray-700" data-week="3" data-period="15 - 21 Februari 2026">
                            Minggu Ketiga
                        </a>
                        <a href="#" class="week-option block px-4 py-3 hover:bg-gray-50 rounded-lg transition-all font-medium text-gray-700" data-week="4" data-period="22 - 28 Februari 2026">
                            Minggu Keempat
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-3 text-gray-500">
                <span class="material-symbols-outlined">info</span>
                <span id="periodDisplay" class="text-sm">Periode: 01 - 07 Februari 2026</span>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[100px]">Tanggal</th>
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[80px]">Hari</th>
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[80px]">Absen</th>
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[180px]">Akun User</th>
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[250px]">Deskripsi Kegiatan</th>
                            <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[120px]">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Info -->
        <div class="flex justify-between items-center mt-6 text-sm text-gray-500">
            <span id="rowCount">Menampilkan 0 laporan</span>
            <span id="summaryInfo" class="font-medium text-[#004643]"></span>
        </div>
    </div>
</div>

<style>
/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}
::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background: #94a3b8;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #64748b;
}

/* Table Row Hover */
tbody tr {
    transition: all 0.2s ease;
}
tbody tr:hover {
    background-color: #f8fafc;
}

/* Status Badge Colors */
.bg-green-100 { background-color: #dcfce7; }
.bg-red-100 { background-color: #fee2e2; }
.bg-blue-100 { background-color: #dbeafe; }
.bg-yellow-100 { background-color: #fef3c7; }
.bg-purple-100 { background-color: #e9d5ff; }
.bg-pink-100 { background-color: #fce7f3; }

.text-green-600 { color: #16a34a; }
.text-red-600 { color: #dc2626; }
.text-blue-600 { color: #2563eb; }
.text-yellow-600 { color: #ca8a04; }
.text-purple-600 { color: #9333ea; }
.text-pink-600 { color: #db2777; }

/* Status Badge */
.status-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: 9999px;
    transition: all 0.2s ease;
}
.status-badge:hover {
    transform: scale(1.05);
}

/* Day Filter Active State */
.day-filter.active {
    background-color: #F9BC60 !important;
    color: #004643 !important;
    box-shadow: 0 4px 12px rgba(249, 188, 96, 0.3);
}

/* Button Active States */
button:active {
    transform: scale(0.98);
}

/* Focus States */
input:focus {
    border-color: #004643 !important;
    box-shadow: 0 0 0 2px rgba(0, 70, 67, 0.2) !important;
}

/* Material Icons */
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}

/* Notification Toast */
.notification-toast {
    position: fixed;
    top: 1rem;
    right: 1rem;
    background-color: white;
    border-left: 4px solid #004643;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
    padding: 1rem;
    z-index: 50;
    transform: translateX(0);
    opacity: 1;
    transition: all 0.3s ease;
}

/* Hidden State */
.hidden {
    display: none !important;
}

/* Rotate Arrow */
.rotate-180 {
    transform: rotate(180deg);
}

/* Description Cell */
.description-cell {
    max-width: 250px;
    white-space: normal;
    word-wrap: break-word;
}

/* Responsive Table */
@media (max-width: 768px) {
    table {
        min-width: 1000px;
    }
    .text-5xl {
        font-size: 2.5rem;
    }
    .px-8 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .py-4 {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ================ DATA LAPORAN PIKET ================
    const laporanData = [
        // Minggu Pertama (01-07 Feb)
        { 
            tanggal: '01/02/2026', 
            hari: 'Senin', 
            absen: 18, 
            nama: 'Kayla Mashudini', 
            deskripsi: 'Membersihkan papan tulis, merapikan kursi, menyapu lantai',
            status: 'Selesai', 
            week: 1 
        },
        { 
            tanggal: '02/02/2026', 
            hari: 'Selasa', 
            absen: 15, 
            nama: 'Andi Pratama', 
            deskripsi: 'Mengelap kaca jendela, membersihkan debu, mengepel lantai',
            status: 'Selesai', 
            week: 1 
        },
        { 
            tanggal: '03/02/2026', 
            hari: 'Rabu', 
            absen: 12, 
            nama: 'Siti Rahma', 
            deskripsi: 'Menyapu koridor, membersihkan toilet, membuang sampah',
            status: 'Belum Selesai', 
            week: 1 
        },
        { 
            tanggal: '04/02/2026', 
            hari: 'Kamis', 
            absen: 20, 
            nama: 'Budi Utomo', 
            deskripsi: 'Merapikan buku di rak, membersihkan meja guru, menyiram tanaman',
            status: 'Selesai', 
            week: 1 
        },
        { 
            tanggal: '05/02/2026', 
            hari: 'Jumat', 
            absen: 14, 
            nama: 'Dewi Lestari', 
            deskripsi: 'Membersihkan laboratorium, menata alat praktikum, mengepel',
            status: 'Belum Selesai', 
            week: 1 
        },
        
        // Minggu Kedua (08-14 Feb)
        { 
            tanggal: '08/02/2026', 
            hari: 'Selasa', 
            absen: 10, 
            nama: 'Fina Aqmei', 
            deskripsi: 'Menyapu ruang kelas, membersihkan papan tulis, merapikan kursi',
            status: 'Belum Selesai', 
            week: 2 
        },
        { 
            tanggal: '09/02/2026', 
            hari: 'Rabu', 
            absen: 22, 
            nama: 'Rudi Hermawan', 
            deskripsi: 'Mengelap kaca, membersihkan ventilasi, mengepel lantai',
            status: 'Selesai', 
            week: 2 
        },
        { 
            tanggal: '10/02/2026', 
            hari: 'Kamis', 
            absen: 16, 
            nama: 'Anisa Putri', 
            deskripsi: 'Membersihkan perpustakaan, menyusun buku, menyapu',
            status: 'Selesai', 
            week: 2 
        },
        { 
            tanggal: '11/02/2026', 
            hari: 'Jumat', 
            absen: 19, 
            nama: 'Hendra Wijaya', 
            deskripsi: 'Menyapu halaman, membersihkan taman, membuang sampah',
            status: 'Belum Selesai', 
            week: 2 
        },
        
        // Minggu Ketiga (15-21 Feb)
        { 
            tanggal: '15/02/2026', 
            hari: 'Rabu', 
            absen: 20, 
            nama: 'Kinandaru Pamudya', 
            deskripsi: 'Membersihkan ruang IT, menata kabel, mengepel lantai',
            status: 'Belum Selesai', 
            week: 3 
        },
        { 
            tanggal: '16/02/2026', 
            hari: 'Kamis', 
            absen: 24, 
            nama: 'Marvin Al-latif', 
            deskripsi: 'Mengelap kaca, membersihkan proyektor, merapikan kursi',
            status: 'Selesai', 
            week: 3 
        },
        { 
            tanggal: '17/02/2026', 
            hari: 'Jumat', 
            absen: 13, 
            nama: 'Sarah Azzahra', 
            deskripsi: 'Menyapu koridor, membersihkan mushola, merapikan sajadah',
            status: 'Selesai', 
            week: 3 
        },
        
        // Minggu Keempat (22-28 Feb)
        { 
            tanggal: '21/02/2026', 
            hari: 'Jumat', 
            absen: 11, 
            nama: 'Herlambang', 
            deskripsi: 'Membersihkan kantin, mengepel lantai, membuang sampah',
            status: 'Selesai', 
            week: 4 
        },
        { 
            tanggal: '22/02/2026', 
            hari: 'Senin', 
            absen: 17, 
            nama: 'Rina Melati', 
            deskripsi: 'Menyapu ruang kelas, membersihkan jendela, merapikan meja',
            status: 'Belum Selesai', 
            week: 4 
        },
        { 
            tanggal: '23/02/2026', 
            hari: 'Selasa', 
            absen: 21, 
            nama: 'Agus Salim', 
            deskripsi: 'Mengelap kaca, membersihkan AC, mengepel lantai',
            status: 'Selesai', 
            week: 4 
        },
        { 
            tanggal: '24/02/2026', 
            hari: 'Rabu', 
            absen: 23, 
            nama: 'Dian Sastro', 
            deskripsi: 'Membersihkan laboratorium, menata alat, menyapu',
            status: 'Selesai', 
            week: 4 
        },
        { 
            tanggal: '25/02/2026', 
            hari: 'Kamis', 
            absen: 14, 
            nama: 'Reza Rahadian', 
            deskripsi: 'Menyapu halaman, membersihkan selokan, membuang sampah',
            status: 'Belum Selesai', 
            week: 4 
        },
        { 
            tanggal: '26/02/2026', 
            hari: 'Jumat', 
            absen: 16, 
            nama: 'Ayu Ting Ting', 
            deskripsi: 'Membersihkan ruang guru, mengepel, merapikan dokumen',
            status: 'Selesai', 
            week: 4 
        }
    ];

    // ================ DAFTAR DESKRIPSI KEGIATAN ================
    const deskripsiList = [
        'Membersihkan papan tulis',
        'Merapikan kursi dan meja',
        'Menyapu lantai',
        'Mengepel lantai',
        'Mengelap kaca jendela',
        'Membersihkan debu',
        'Membuang sampah',
        'Membersihkan toilet',
        'Menyapu koridor',
        'Merapikan buku di rak',
        'Membersihkan laboratorium',
        'Menata alat praktikum',
        'Membersihkan perpustakaan',
        'Menyapu halaman',
        'Membersihkan taman',
        'Membersihkan ruang IT',
        'Menata kabel',
        'Membersihkan proyektor',
        'Membersihkan mushola',
        'Merapikan sajadah',
        'Membersihkan kantin',
        'Membersihkan AC',
        'Membersihkan selokan',
        'Membersihkan ruang guru',
        'Merapikan dokumen',
        'Menyiram tanaman',
        'Membersihkan ventilasi',
        'Menata perlengkapan kelas'
    ];

    // ================ VARIABLES ================
    let currentWeek = 1;
    let currentFilterDay = 'all';
    let currentSearchTerm = '';

    // ================ DOM ELEMENTS ================
    const tableBody = document.getElementById('tableBody');
    const searchInput = document.getElementById('searchInput');
    const weekButton = document.getElementById('weekButton');
    const weekMenu = document.getElementById('weekMenu');
    const weekArrow = document.getElementById('weekArrow');
    const selectedWeek = document.getElementById('selectedWeek');
    const periodDisplay = document.getElementById('periodDisplay');
    const weekOptions = document.querySelectorAll('.week-option');
    const dayFilters = document.querySelectorAll('.day-filter');
    const profileButton = document.getElementById('profileButton');
    const profileMenu = document.getElementById('profileMenu');
    const profileArrow = document.getElementById('dropdownArrow');
    const logoutBtn = document.getElementById('logoutBtn');
    const summaryInfo = document.getElementById('summaryInfo');

    // ================ PERIODE MINGGU ================
    const weekPeriods = {
        1: '01 - 07 Februari 2026',
        2: '08 - 14 Februari 2026',
        3: '15 - 21 Februari 2026',
        4: '22 - 28 Februari 2026'
    };

    // ================ FUNGSI FILTER ================
    function getFilteredData() {
        // 1. Filter berdasarkan minggu
        let filtered = laporanData.filter(item => item.week === currentWeek);
        
        // 2. Filter berdasarkan hari
        if (currentFilterDay !== 'all') {
            filtered = filtered.filter(item => item.hari === currentFilterDay);
        }
        
        // 3. Filter berdasarkan search
        if (currentSearchTerm && currentSearchTerm.trim() !== '') {
            const term = currentSearchTerm.toLowerCase().trim();
            filtered = filtered.filter(item => 
                item.nama.toLowerCase().includes(term) || 
                item.hari.toLowerCase().includes(term) || 
                item.absen.toString().includes(term) ||
                item.tanggal.includes(term) ||
                item.deskripsi.toLowerCase().includes(term) ||
                item.status.toLowerCase().includes(term)
            );
        }
        
        return filtered;
    }

    // ================ FUNGSI RENDER TABLE ================
    function renderTable() {
        const filteredData = getFilteredData();
        
        // Sort by tanggal
        filteredData.sort((a, b) => {
            const [da, ma, ya] = a.tanggal.split('/');
            const [db, mb, yb] = b.tanggal.split('/');
            const dateA = new Date(ya, ma - 1, da);
            const dateB = new Date(yb, mb - 1, db);
            return dateA - dateB;
        });
        
        // Hitung statistik
        const total = filteredData.length;
        const selesai = filteredData.filter(item => item.status === 'Selesai').length;
        const belum = filteredData.filter(item => item.status === 'Belum Selesai').length;
        
        // Render rows
        if (filteredData.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="py-12 text-center text-gray-500">
                        <span class="material-symbols-outlined text-5xl mb-3 text-gray-400">info</span>
                        <p class="text-lg font-medium">Tidak ada laporan piket</p>
                        <p class="text-sm mt-1">Coba filter lain atau pilih minggu yang berbeda</p>
                    </td>
                </tr>
            `;
            document.getElementById('rowCount').textContent = 'Menampilkan 0 laporan';
            summaryInfo.textContent = '';
            return;
        }
        
        let html = '';
        filteredData.forEach(item => {
            const isSelesai = item.status === 'Selesai';
            const statusClass = isSelesai ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600';
            
            // Warna untuk hari
            let dayColorClass = '';
            if (item.hari === 'Senin') dayColorClass = 'bg-blue-100 text-blue-600';
            else if (item.hari === 'Selasa') dayColorClass = 'bg-yellow-100 text-yellow-600';
            else if (item.hari === 'Rabu') dayColorClass = 'bg-green-100 text-green-600';
            else if (item.hari === 'Kamis') dayColorClass = 'bg-purple-100 text-purple-600';
            else if (item.hari === 'Jumat') dayColorClass = 'bg-pink-100 text-pink-600';
            
            html += `
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                    <td class="py-5 px-6 text-center font-medium text-gray-800">${item.tanggal}</td>
                    <td class="py-5 px-6 text-center">
                        <span class="px-4 py-2 ${dayColorClass} font-semibold rounded-full text-sm">
                            ${item.hari}
                        </span>
                    </td>
                    <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">${item.absen}</td>
                    <td class="py-5 px-6 text-center font-medium text-gray-800">${item.nama}</td>
                    <td class="py-5 px-6 text-left description-cell">
                        <div class="flex items-start gap-2">
                            <span class="material-symbols-outlined text-[#004643] text-lg mt-0.5 flex-shrink-0">
                                description
                            </span>
                            <span class="text-gray-700">${item.deskripsi}</span>
                        </div>
                    </td>
                    <td class="py-5 px-6 text-center">
                        <span class="px-4 py-2 ${statusClass} font-semibold rounded-full text-sm status-badge">
                            ${item.status}
                        </span>
                    </td>
                </tr>
            `;
        });
        
        tableBody.innerHTML = html;
        document.getElementById('rowCount').textContent = `Menampilkan ${filteredData.length} laporan piket`;
        summaryInfo.textContent = `${selesai} Selesai | ${belum} Belum Selesai`;
    }

    // ================ DROPDOWN MINGGU ================
    weekButton.addEventListener('click', function(e) {
        e.stopPropagation();
        weekMenu.classList.toggle('hidden');
        weekArrow.classList.toggle('rotate-180');
    });

    weekOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const week = parseInt(this.dataset.week);
            const weekName = this.textContent;
            const period = this.dataset.period;
            
            // Update state
            currentWeek = week;
            selectedWeek.textContent = weekName;
            periodDisplay.textContent = `Periode: ${period}`;
            
            // Reset filter hari ke SEMUA saat ganti minggu
            currentFilterDay = 'all';
            dayFilters.forEach(f => f.classList.remove('active'));
            document.querySelector('.day-filter[data-day="all"]').classList.add('active');
            
            // Close dropdown
            weekMenu.classList.add('hidden');
            weekArrow.classList.remove('rotate-180');
            
            // Render ulang tabel
            renderTable();
            
            showNotification(`Menampilkan ${weekName}`);
        });
    });

    // ================ DROPDOWN PROFIL ================
    profileButton.addEventListener('click', function(e) {
        e.stopPropagation();
        profileMenu.classList.toggle('hidden');
        profileArrow.classList.toggle('rotate-180');
    });

    // ================ CLICK OUTSIDE ================
    document.addEventListener('click', function(e) {
        if (!weekButton.contains(e.target) && !weekMenu.contains(e.target)) {
            weekMenu.classList.add('hidden');
            weekArrow.classList.remove('rotate-180');
        }
        if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.classList.add('hidden');
            profileArrow.classList.remove('rotate-180');
        }
    });

    // ================ SEARCH FILTER ================
    searchInput.addEventListener('input', function(e) {
        currentSearchTerm = e.target.value;
        renderTable();
        
        if (currentSearchTerm.trim() !== '') {
            showNotification(`Mencari: "${currentSearchTerm}"`);
        }
    });

    // ================ DAY FILTER ================
    dayFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            dayFilters.forEach(f => f.classList.remove('active'));
            
            // Add active class to clicked filter
            this.classList.add('active');
            
            // Get day value
            currentFilterDay = this.dataset.day;
            
            // Render table
            renderTable();
            
            // Show notification
            const dayName = this.textContent.trim();
            if (dayName === 'SEMUA') {
                showNotification('Menampilkan semua hari');
            } else {
                showNotification(`Filter hari: ${dayName}`);
            }
        });
    });

    // ================ LOGOUT ================
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                showNotification('Berhasil logout!');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 1000);
            }
        });
    }

    // ================ NOTIFICATION FUNCTION ================
    function showNotification(message) {
        const existingNotification = document.querySelector('.notification-toast');
        if (existingNotification) existingNotification.remove();
        
        const notification = document.createElement('div');
        notification.className = 'notification-toast';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[#004643]">check_circle</span>
                <span class="font-medium text-[#004643]">${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // ================ INITIAL RENDER ================
    // Set active day filter ke "SEMUA"
    document.querySelector('.day-filter[data-day="all"]').classList.add('active');
    renderTable();
});
</script>

@endsection