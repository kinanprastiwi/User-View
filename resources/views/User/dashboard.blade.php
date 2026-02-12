@extends('layouts.app')

@section('title', 'Halaman Utama - Aplikasi Piket')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Header dengan Kelas dan Ikon Bell -->
    <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-12">
        <!-- Kelas -->
        <div class="flex items-center gap-4 w-full lg:w-auto justify-center lg:justify-start">
            <div class="bg-white px-8 py-5 rounded-2xl shadow-lg border border-gray-100">
                <h2 class="text-4xl font-bold text-[#004643] text-center lg:text-left">
                    XII RPL
                </h2>
            </div>

            <!-- Ikon Bell di sebelah kelas -->
            <div class="relative group">
                <div class="relative p-4 bg-white rounded-full shadow-lg cursor-pointer hover:shadow-xl transition-all border border-gray-200">
                    <span class="material-symbols-outlined text-2xl text-[#004643]">
                        notifications
                    </span>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center animate-pulse font-bold">
                        1
                    </span>

                    
                </div>

                

                <!-- Dropdown Notifikasi -->
                <div class="absolute top-full left-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-200 z-50 
                           opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                           transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0">
                    <div class="p-5 border-b border-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-[#004643] text-lg">Pemberitahuan</h3>
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">1 baru</span>
                        </div>
                    </div>

                    <div class="max-h-full overflow-y-auto">
                        <a href="#" class="flex items-start gap-4 p-5 hover:bg-gray-50 border-b border-gray-100">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#F9BC60] rounded-full ">
                                <span class="material-symbols-outlined text-[#004643]">
                                    event
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <p class="font-semibold text-[#004643]">Jadwal Piket Baru</p>
                                    <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                                </div>
                                <p class="text-sm text-gray-600">Anda mendapat jadwal piket tanggal 5 Januari 2026</p>
                                <span class="text-xs text-gray-500 mt-2 block">5/1/2026 • Baru</span>
                            </div>
                        </a>
                    </div>

                    
                    
                    <div class="absolute top-0 -left-4 w-4 h-4 bg-white transform rotate-45 border-t border-l border-gray-200"></div>
                </div>
            </div>
        </div>
    </div>

 <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-[#004643]">
                        person
                    </span>
                </div>
                <div>
                    <p class="font-bold text-[#004643]">Budi Santoso</p>
                    <p class="text-sm text-gray-500">XII RPL</p>
                </div>
                <span class="material-symbols-outlined text-[#004643] transform transition-transform group-hover:rotate-180">
                    expand_more
                </span>
            </div>
            <br>

    <!-- Grid Utama -->
    <div class=" wgrid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Kolom 1: Pemberitahuan Terbaru -->
        <div class="lg:col-span-2">
            <!-- Pemberitahuan Terbaru -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-10 ">
                <div class="text-center mb-10 ">
                    <h3 class="text-3xl font-bold text-[#004643] mb-4">Pemberitahuan Terbaru</h3>
                    
                    <!-- Table Header Days Filter -->
        <div class="bg-[#004643] p-6">
            <div class="flex flex-wrap justify-center gap-3 mb-4">
                <button class="px-6 py-3 bg-[#F9BC60] text-[#004643] font-bold rounded-xl hover:bg-[#F9BC60]/80 transition-colors shadow-md">
                    SENIN
                </button>
                <button class="px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-colors">
                    SELASA
                </button>
                <button class="px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-colors">
                    RABU
                </button>
                <button class="px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-colors">
                    KAMIS
                </button>
                <button class="px-6 py-3 bg-white/20 text-white font-bold rounded-xl hover:bg-white/30 transition-colors">
                    JUMAT
                </button>
            </div>
        </div>
                </div>

                <!-- Tabel Notifikasi -->
                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-[#004643]">
                                <th class="py-5 px-6 text-white font-bold text-center border-r border-[#004643]/50">Jenis</th>
                                <th class="py-5 px-6 text-white font-bold text-center border-r border-[#004643]/50">Status</th>
                                <th class="py-5 px-6 text-white font-bold text-center border-r border-[#004643]/50">Tanggal</th>
                                <th class="py-5 px-6 text-white font-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baris 1 -->
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                                <td class="py-5 px-6 text-center">
                                    <div>
                                        <p class="font-bold text-[#004643] text-lg">Judul</p>
                                        <p class="text-gray-600">Deskripsi</p>
                                    </div>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <div>
                                        <p class="font-bold text-[#004643] text-lg">Jadwal Piket Baru</p>
                                        <p class="text-gray-600">Anda mendapat jadwal piket tanggal 5 Januari 2026</p>
                                    </div>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <p class="text-[#004643] font-bold text-xl">5/1/2026</p>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <button class="inline-flex items-center justify-center w-12 h-12 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-colors">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </button>
                                </td>
                            </tr>

                            <!-- Baris 2 -->
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                                <td class="py-5 px-6 text-center">
                                    <div>
                                        <p class="font-bold text-[#004643] text-lg">Laporan Disetujui</p>
                                        <p class="text-gray-600">Deskripsi laporan disetujui</p>
                                    </div>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <div>
                                        <p class="font-bold text-[#004643] text-lg">Pengingat Piket</p>
                                        <p class="text-gray-600">Jangan lupa piket besok!</p>
                                    </div>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <p class="text-[#004643] font-bold text-xl">4/1/2026</p>
                                </td>
                                <td class="py-5 px-6 text-center">
                                    <button class="inline-flex items-center justify-center w-12 h-12 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-colors">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Jadwal Piket Anda -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-[#004643]">Jadwal Piket Anda</h3>
                </div>
                
                <!-- Card Jadwal yang bisa diklik -->
                <div id="jadwalCard" class="bg-gradient-to-r from-[#F9BC60] to-[#F9BC60]/90 rounded-2xl p-8 shadow-xl cursor-pointer hover:shadow-2xl transition-all duration-300 active:scale-[0.99]">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 flex items-center justify-center bg-white/30 rounded-2xl">
                                <span class="material-symbols-outlined text-[#004643] text-3xl">
                                    location_on
                                </span>
                            </div>
                            <div class="text-center lg:text-left">
                                <h4 class="text-2xl font-bold text-[#004643] mb-2">Piket Ruang IT</h4>
                                <div class="flex items-center justify-center lg:justify-start gap-3">
                                    <span class="material-symbols-outlined text-[#004643]">
                                        event
                                    </span>
                                    <p class="text-[#004643] font-bold text-xl">5/1/2026</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Status Badge -->
                        <div>
                            <span class="px-8 py-3 bg-white text-[#004643] border-2 border-[#F9BC60] font-bold rounded-xl text-lg inline-block shadow-md">
                                Pending
                            </span>
                        </div>
                    </div>
                </div>

               
<!-- MODAL DETAIL JADWAL (Muncul saat KLIK) -->
<div id="detailModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-hidden flex flex-col">
        <!-- Header Modal -->
        <div class="bg-[#004643] p-8 flex-shrink-0">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-4">
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-white">Detail Jadwal</h2>
                    <p class="text-white/80 mt-2">ID: PKT-2026-001</p>
                </div>
                <button id="closeModal" class="text-white hover:text-[#F9BC60] text-3xl transition-colors">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>
        </div>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto">
            <!-- Content Modal - Grid 2 kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0 min-h-full">
                
                <!-- Kolom Kiri: Informasi Detail -->
                <div class="lg:col-span-2 p-8">
                    <!-- Langkah 1: Informasi Utama -->
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-[#004643] mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#004643] text-white rounded-full flex items-center justify-center text-sm">1</span>
                            Informasi Jadwal
                        </h3>
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Lokasi:</span>
                                    <span class="text-xl font-bold text-[#004643]">Ruang IT - Lantai 2</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Tanggal:</span>
                                    <span class="text-xl font-bold text-[#004643]">5 Januari 2026</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="text-xl font-bold text-[#F9BC60]">Pending</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Waktu:</span>
                                    <span class="text-xl font-bold text-[#004643]">07:00 - 08:00 WIB</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Langkah 2: Deskripsi Tugas -->
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-[#004643] mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#004643] text-white rounded-full flex items-center justify-center text-sm">2</span>
                            Deskripsi Tugas:
                        </h3>
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 p-3 hover:bg-white/50 rounded-lg transition">
                                    <span class="material-symbols-outlined text-green-600">
                                        check_circle
                                    </span>
                                    <span class="font-medium">Membersihkan papan tulis</span>
                                </li>
                                <li class="flex items-center gap-3 p-3 hover:bg-white/50 rounded-lg transition">
                                    <span class="material-symbols-outlined text-green-600">
                                        check_circle
                                    </span>
                                    <span class="font-medium">Merapikan kursi</span>
                                </li>
                                <li class="flex items-center gap-3 p-3 hover:bg-white/50 rounded-lg transition">
                                    <span class="material-symbols-outlined text-green-600">
                                        check_circle
                                    </span>
                                    <span class="font-medium">Menyapu lantai</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Langkah 3: Aksi -->
                    <div class="mb-10">
                        <h3 class="text-xl font-bold text-[#004643] mb-4 flex items-center gap-2">
                            <span class="w-8 h-8 bg-[#004643] text-white rounded-full flex items-center justify-center text-sm">3</span>
                            Aksi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <button class="flex items-center justify-center gap-3 px-6 py-4 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition">
                                <span class="material-symbols-outlined">
                                    check_circle
                                </span>
                                Tandai Selesai
                            </button>
                            <button class="flex items-center justify-center gap-3 px-6 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition">
                                <span class="material-symbols-outlined">
                                    upload
                                </span>
                                Upload Foto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Gambar Terupload -->
                <div class="lg:col-span-1 border-l border-gray-200 bg-gray-50/50">
                    <div class="p-8 h-full">
                        <h3 class="text-xl font-bold text-[#004643] mb-6 text-center">Gambar Terupload</h3>
                        
                        <!-- Container Gambar dengan Scroll -->
                        <div class="space-y-8 max-h-[calc(100vh-300px)] overflow-y-auto pr-2">
                            <!-- Foto Sebelum -->
                            <div class="text-center bg-white p-6 rounded-2xl shadow-sm">
                                <h4 class="font-semibold text-[#004643] mb-4 text-lg">Foto Sebelum</h4>
                                <div class="border-2 border-dashed border-gray-300 rounded-2xl h-64 flex flex-col items-center justify-center hover:border-[#004643] transition cursor-pointer bg-gray-50">
                                    <span class="material-symbols-outlined text-5xl text-gray-400 mb-4">
                                        add_photo_alternate
                                    </span>
                                    <p class="text-gray-500 text-center px-4 text-sm">Klik untuk upload foto kondisi sebelum</p>
                                    <p class="text-xs text-gray-400 mt-2">Max. 5MB</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-3 text-center">Gambar belum diupload</p>
                            </div>

                            <!-- Foto Sesudah -->
                            <div class="text-center bg-white p-6 rounded-2xl shadow-sm">
                                <h4 class="font-semibold text-[#004643] mb-4 text-lg">Foto Sesudah</h4>
                                <div class="border-2 border-dashed border-gray-300 rounded-2xl h-64 flex flex-col items-center justify-center hover:border-[#004643] transition cursor-pointer bg-gray-50">
                                    <span class="material-symbols-outlined text-5xl text-gray-400 mb-4">
                                        add_photo_alternate
                                    </span>
                                    <p class="text-gray-500 text-center px-4 text-sm">Klik untuk upload foto kondisi sesudah</p>
                                    <p class="text-xs text-gray-400 mt-2">Max. 5MB</p>
                                </div>
                                <p class="text-sm text-gray-500 mt-3 text-center">Gambar belum diupload</p>
                            </div>

                            <!-- Status Upload -->
                            <div class="text-center bg-white p-6 rounded-2xl shadow-sm">
                                <h4 class="font-semibold text-[#004643] mb-4 text-lg">Status Upload</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                                        <span class="text-sm font-medium">Foto Sebelum:</span>
                                        <span class="text-sm text-yellow-600 font-bold">Belum diupload</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                                        <span class="text-sm font-medium">Foto Sesudah:</span>
                                        <span class="text-sm text-yellow-600 font-bold">Belum diupload</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg mt-4">
                                        <span class="text-sm font-medium">Status Jadwal:</span>
                                        <span class="text-sm text-green-600 font-bold">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Modal -->
        <div class="border-t border-gray-200 p-6 bg-gray-50 flex-shrink-0">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    <p>Terakhir diperbarui: 9 Februari 2026 15:40 WIB</p>
                </div>
                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-[#004643] text-white font-medium rounded-lg hover:bg-[#003432] transition">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Scrollbar Styling untuk modal */
#detailModal .overflow-y-auto {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}

#detailModal .overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}

#detailModal .overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

#detailModal .overflow-y-auto::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

#detailModal .overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Scrollbar untuk kolom gambar */
.pr-2::-webkit-scrollbar {
    width: 4px;
}

.pr-2::-webkit-scrollbar-track {
    background: #f8fafc;
    border-radius: 10px;
}

.pr-2::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 10px;
}

.pr-2::-webkit-scrollbar-thumb:hover {
    background: #cbd5e1;
}

/* Animasi untuk modal */
#detailModal {
    backdrop-filter: blur(4px);
    animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Animasi untuk konten modal */
#detailModal > div {
    animation: modalSlideIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Hover effect untuk area upload */
.border-dashed:hover {
    border-color: #004643;
    background-color: #f8f9fa;
}

/* Efek untuk numbered steps */
.w-8.h-8 {
    transition: all 0.3s ease;
}

.w-8.h-8:hover {
    transform: scale(1.1);
    background-color: #003432;
}

/* Style untuk list item tugas */
li.flex.items-center.gap-3 {
    transition: all 0.2s ease;
}

li.flex.items-center.gap-3:hover {
    transform: translateX(5px);
    background-color: white;
}

/* Tombol hover effects */
button:hover {
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

button:active {
    transform: translateY(0);
}

/* Responsive adjustments untuk modal */
@media (max-width: 1024px) {
    .lg\:col-span-2, .lg\:col-span-1 {
        grid-column: span 1;
    }
    
    #detailModal .p-8 {
        padding: 1.5rem;
    }
    
    .max-h-\[calc\(100vh-300px\)\] {
        max-height: 400px;
    }
}

@media (max-width: 768px) {
    #detailModal .text-3xl {
        font-size: 1.75rem;
    }
    
    #detailModal .text-xl {
        font-size: 1.25rem;
    }
    
    .h-64 {
        height: 200px;
    }
}

/* Smooth scrolling untuk modal */
#detailModal {
    scroll-behavior: smooth;
}

/* Gradient untuk elemen penting */
.bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
}

/* Shadow untuk depth */
.shadow-2xl {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.rounded-3xl {
    border-radius: 1.5rem;
}

/* Transisi untuk semua elemen */
.transition {
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}

/* Loading animation untuk upload */
@keyframes pulse-upload {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.uploading {
    animation: pulse-upload 1.5s infinite;
}

/* Badge status styling */
.text-\[#F9BC60\] {
    color: #F9BC60;
}

.bg-\[#F9BC60\] {
    background-color: #F9BC60;
}

/* Custom scrollbar untuk Firefox */
* {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}

/* Smooth transitions untuk hover effects */
.hover\:bg-green-700:hover {
    background-color: #047857;
}

.hover\:bg-blue-700:hover {
    background-color: #1d4ed8;
}

.hover\:border-\[\#004643\]:hover {
    border-color: #004643;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const jadwalCard = document.getElementById('jadwalCard');
    const detailModal = document.getElementById('detailModal');
    const closeModal = document.getElementById('closeModal');
    
    // Open Modal
    jadwalCard.addEventListener('click', function() {
        detailModal.classList.remove('hidden');
        detailModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Add active class to clicked card
        jadwalCard.classList.add('ring-4', 'ring-[#004643]/20');
    });

    // Close Modal
    closeModal.addEventListener('click', function() {
        closeModalFunction();
    });

    // Close Modal when clicking outside
    detailModal.addEventListener('click', function(e) {
        if (e.target === detailModal) {
            closeModalFunction();
        }
    });

    // Close Modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailModal.classList.contains('flex')) {
            closeModalFunction();
        }
    });

    function closeModalFunction() {
        detailModal.classList.remove('flex');
        detailModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
        jadwalCard.classList.remove('ring-4', 'ring-[#004643]/20');
    }

    // Upload gambar di modal
    const modalUploadAreas = document.querySelectorAll('#detailModal .border-dashed');
    modalUploadAreas.forEach((area, index) => {
        area.addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = function(e) {
                if (e.target.files && e.target.files[0]) {
                    // Show loading state
                    area.innerHTML = `
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-12 h-12 border-4 border-[#004643] border-t-transparent rounded-full animate-spin mb-3"></div>
                            <p class="text-gray-500 text-center">Mengupload...</p>
                        </div>
                    `;
                    area.classList.add('uploading');
                    
                    // Simulate upload delay
                    setTimeout(() => {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            area.innerHTML = `
                                <img src="${event.target.result}" 
                                     class="w-full h-64 object-cover rounded-2xl" 
                                     alt="Preview">
                            `;
                            area.classList.remove('uploading');
                            
                            // Update status text
                            const parentDiv = area.parentElement;
                            const textElement = parentDiv.querySelector('p.text-center');
                            if (textElement) {
                                textElement.textContent = 'Gambar terupload ✓';
                                textElement.className = 'text-green-600 font-bold mt-3 text-center';
                                
                                // Update status in status section
                                const statusSection = document.querySelector('.bg-white.p-6.rounded-2xl.shadow-sm:last-child');
                                if (statusSection) {
                                    const statusItems = statusSection.querySelectorAll('.flex.items-center.justify-between');
                                    if (statusItems[index]) {
                                        statusItems[index].querySelector('span:last-child').textContent = '✓ Terupload';
                                        statusItems[index].querySelector('span:last-child').className = 'text-sm text-green-600 font-bold';
                                        statusItems[index].classList.remove('bg-yellow-50');
                                        statusItems[index].classList.add('bg-green-50');
                                    }
                                }
                            }
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }, 1500);
                }
            };
            input.click();
        });
    });

    // Tandai Selesai button
    const selesaiBtn = document.querySelector('#detailModal button:first-child');
    if (selesaiBtn) {
        selesaiBtn.addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin menandai jadwal ini sebagai selesai?')) {
                // Update status in modal
                const statusElement = document.querySelector('#detailModal .text-\\[\\#F9BC60\\]');
                if (statusElement) {
                    statusElement.textContent = 'Selesai';
                    statusElement.className = 'text-xl font-bold text-green-600';
                }
                
                // Update status badge on card
                const cardStatus = document.querySelector('#jadwalCard span:last-child');
                if (cardStatus) {
                    cardStatus.textContent = 'Selesai';
                    cardStatus.className = 'px-8 py-3 bg-white text-green-600 border-2 border-green-600 font-bold rounded-xl text-lg inline-block shadow-md';
                }
                
                // Update status in status section
                const statusSection = document.querySelector('.bg-white.p-6.rounded-2xl.shadow-sm:last-child .bg-green-50');
                if (statusSection) {
                    const statusText = statusSection.querySelector('span:last-child');
                    if (statusText) {
                        statusText.textContent = 'Selesai';
                    }
                }
                
                // Show success notification
                showNotification('Jadwal berhasil ditandai sebagai selesai!', 'success');
                
                // Close modal after delay
                setTimeout(() => {
                    closeModalFunction();
                }, 2000);
            }
        });
    }

    // Simpan Perubahan button
    const simpanBtn = document.querySelector('#detailModal button.bg-\\[\\#004643\\]');
    if (simpanBtn) {
        simpanBtn.addEventListener('click', function() {
            showNotification('Perubahan berhasil disimpan!', 'success');
        });
    }

    // Helper function for notifications
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-blue-500';
        const icon = type === 'success' ? 'check_circle' : 'info';
        
        notification.className = `fixed top-4 right-4 ${bgColor} text-white shadow-lg rounded-lg p-4 z-50 transform translate-x-full opacity-0 transition-all duration-300 flex items-center gap-3`;
        notification.innerHTML = `
            <span class="material-symbols-outlined">
                ${icon}
            </span>
            <span class="font-medium">${message}</span>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full', 'opacity-0');
            notification.classList.add('translate-x-0', 'opacity-100');
        }, 10);
        
        // Animate out after 3 seconds
        setTimeout(() => {
            notification.classList.remove('translate-x-0', 'opacity-100');
            notification.classList.add('translate-x-full', 'opacity-0');
            
            // Remove from DOM
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
});
</script>
@endsection