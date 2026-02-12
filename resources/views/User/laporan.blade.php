@extends('layouts.app')

@section('title', 'Jadwal Piket - Aplikasi Piket')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-bold text-[#004643] mb-2">Jadwal Piket</h1>
            <p class="text-gray-600">Kelola dan pantau jadwal piket Anda</p>
        </div>
        
       

                <!-- Arrow Indicator -->
                <div class="absolute -top-2 right-6 w-4 h-4 bg-white transform rotate-45 border-t border-l border-gray-200"></div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h3 class="text-lg font-semibold text-[#004643] mb-1">Filter details...</h3>
                <p class="text-sm text-gray-500">(cari nama, kelas, atau absen)</p>
            </div>
            
            <!-- Search Box -->
            <div class="relative w-full md:w-80">
                <input type="text" 
                       placeholder="Cari nama, kelas, atau absen..." 
                       class="w-full px-4 py-3 pr-12 border-2 border-gray-200 rounded-xl focus:border-[#004643] focus:outline-none focus:ring-2 focus:ring-[#004643]/20 transition-all">
                <span class="material-symbols-outlined absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                    search
                </span>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
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

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-200">
                        <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[120px]">Tanggal</th>
                        <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[100px]">Hari</th>
                        <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[80px]">Absen</th>
                        <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[180px]">Akun User</th>
                        <th class="py-4 px-6 text-center font-bold text-[#004643] min-w-[120px]">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="py-5 px-6 text-center font-medium text-gray-800">01/02/2026</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-blue-100 text-blue-600 font-semibold rounded-full text-sm">
                                Senin
                            </span>
                        </td>
                        <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">18</td>
                        <td class="py-5 px-6 text-center font-medium text-gray-800">Kayla Mashudini</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-green-100 text-green-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-green-200 transition">
                                Selesai
                            </span>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="py-5 px-6 text-center font-medium text-gray-800">08/02/2026</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-yellow-100 text-yellow-600 font-semibold rounded-full text-sm">
                                Selasa
                            </span>
                        </td>
                        <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">10</td>
                        <td class="py-5 px-6 text-center font-medium text-gray-800">Fina Agmei</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-red-100 text-red-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-red-200 transition">
                                Belum Selesai
                            </span>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="py-5 px-6 text-center font-medium text-gray-800">15/02/2026</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-green-100 text-green-600 font-semibold rounded-full text-sm">
                                Rabu
                            </span>
                        </td>
                        <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">20</td>
                        <td class="py-5 px-6 text-center font-medium text-gray-800">Kinandaru Pamudya</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-red-100 text-red-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-red-200 transition">
                                Belum Selesai
                            </span>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="py-5 px-6 text-center font-medium text-gray-800">16/02/2026</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-purple-100 text-purple-600 font-semibold rounded-full text-sm">
                                Kamis
                            </span>
                        </td>
                        <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">24</td>
                        <td class="py-5 px-6 text-center font-medium text-gray-800">Marvin Al-latif</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-green-100 text-green-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-green-200 transition">
                                Selesai
                            </span>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-5 px-6 text-center font-medium text-gray-800">21/02/2026</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-pink-100 text-pink-600 font-semibold rounded-full text-sm">
                                Jumat
                            </span>
                        </td>
                        <td class="py-5 px-6 text-center font-bold text-[#004643] text-xl">11</td>
                        <td class="py-5 px-6 text-center font-medium text-gray-800">Herlambang</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-4 py-2 bg-green-100 text-green-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-green-200 transition">
                                Selesai
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="bg-gray-50 p-6 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500">
                    Menampilkan 5 dari 30 jadwal
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <span class="material-symbols-outlined text-sm">
                            chevron_left
                        </span>
                    </button>
                    <button class="px-4 py-2 bg-[#004643] text-white rounded-lg font-semibold text-sm">
                        1
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                        2
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm">
                        3
                    </button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <span class="material-symbols-outlined text-sm">
                            chevron_right
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
/* Custom Scrollbar */
.overflow-x-auto {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}

.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Status Badge Animations */
.bg-red-100, .bg-green-100 {
    transition: all 0.2s ease;
}

.bg-red-100:hover {
    background-color: #fed7d7 !important;
    transform: scale(1.05);
}

.bg-green-100:hover {
    background-color: #c6f6d5 !important;
    transform: scale(1.05);
}

/* Hover Effects */
tr {
    transition: background-color 0.2s ease;
}

tr:hover {
    background-color: #f9fafb;
}

/* Day Badge Colors */
.bg-blue-100 { background-color: #dbeafe; }
.bg-yellow-100 { background-color: #fef3c7; }
.bg-green-100 { background-color: #d1fae5; }
.bg-purple-100 { background-color: #e9d5ff; }
.bg-pink-100 { background-color: #fce7f3; }

/* Day Filter Button Hover Effects */
.bg-white\/20:hover {
    background-color: rgba(255, 255, 255, 0.3) !important;
}

.bg-\[\#F9BC60\] {
    box-shadow: 0 4px 12px rgba(249, 188, 96, 0.3);
}

/* User Dropdown Animation */
.group:hover .shadow-lg {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    table th, table td {
        padding-left: 1rem;
        padding-right: 1rem;
        font-size: 0.875rem;
    }
    
    .px-6 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .text-xl {
        font-size: 1.25rem;
    }
}

/* Day Filter Button Active State */
.active-day {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { 
        transform: scale(1); 
        box-shadow: 0 4px 12px rgba(249, 188, 96, 0.3);
    }
    50% { 
        transform: scale(1.05); 
        box-shadow: 0 6px 20px rgba(249, 188, 96, 0.5);
    }
}

/* Search Input Focus Effect */
input:focus {
    border-color: #004643 !important;
    box-shadow: 0 0 0 2px rgba(0, 70, 67, 0.2) !important;
}

/* Table Header Styling */
.bg-\[\#004643\] {
    background-color: #004643 !important;
}

/* Material Icons Size */
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    const tableRows = document.querySelectorAll('tbody tr');
    
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            let visibleRows = 0;
            
            tableRows.forEach(row => {
                const textContent = row.textContent.toLowerCase();
                if (textContent.includes(searchTerm)) {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update footer count
            updateRowCount(visibleRows);
        });
    }
    
    // Day filter buttons
    const dayButtons = document.querySelectorAll('.bg-white\\/20, .bg-\\[\\#F9BC60\\]');
    dayButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            dayButtons.forEach(btn => {
                btn.classList.remove('bg-[#F9BC60]', 'text-[#004643]', 'active-day');
                btn.classList.add('bg-white/20', 'text-white');
            });
            
            // Add active class to clicked button
            this.classList.remove('bg-white/20', 'text-white');
            this.classList.add('bg-[#F9BC60]', 'text-[#004643]', 'active-day');
            
            const day = this.textContent.trim();
            filterByDay(day);
        });
    });
    
    // Status toggle functionality
    const statusBadges = document.querySelectorAll('tbody td:last-child span');
    statusBadges.forEach(badge => {
        badge.addEventListener('click', function() {
            const currentStatus = this.textContent.trim();
            const newStatus = currentStatus === 'Selesai' ? 'Belum Selesai' : 'Selesai';
            
            // Update badge appearance
            if (newStatus === 'Selesai') {
                this.className = 'px-4 py-2 bg-green-100 text-green-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-green-200 transition';
            } else {
                this.className = 'px-4 py-2 bg-red-100 text-red-600 font-semibold rounded-full text-sm cursor-pointer hover:bg-red-200 transition';
            }
            
            this.textContent = newStatus;
            
            // Show notification
            showNotification(`Status berhasil diubah menjadi: ${newStatus}`);
        });
    });
    
    // Logout button
    const logoutBtn = document.querySelector('a.bg-red-50');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Add logout logic here
                window.location.href = '/logout';
            }
        });
    }
    
    // Pagination buttons
    const paginationButtons = document.querySelectorAll('.bg-white.border');
    paginationButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active state from all number buttons
            const numberButtons = document.querySelectorAll('.bg-white.border, .bg-\\[\\#004643\\]');
            numberButtons.forEach(btn => {
                if (!btn.querySelector('span')) { // Not arrow buttons
                    btn.classList.remove('bg-[#004643]', 'text-white');
                    btn.classList.add('bg-white', 'border-gray-300');
                }
            });
            
            // Add active state to clicked button (if not arrow)
            if (!this.querySelector('span')) {
                this.classList.remove('bg-white', 'border-gray-300');
                this.classList.add('bg-[#004643]', 'text-white');
            }
            
            showNotification('Halaman berhasil diubah');
        });
    });
    
    // User dropdown functionality
    const userDropdown = document.querySelector('.group');
    const userMenu = userDropdown.querySelector('div.absolute');
    
    let hoverTimer;
    let leaveTimer;

    if (userDropdown && userMenu) {
        userDropdown.addEventListener('mouseenter', function() {
            clearTimeout(leaveTimer);
            hoverTimer = setTimeout(() => {
                userMenu.classList.remove('opacity-0', 'invisible');
                userMenu.classList.add('opacity-100', 'visible');
            }, 100);
        });

        userDropdown.addEventListener('mouseleave', function(e) {
            clearTimeout(hoverTimer);
            
            const isLeavingToMenu = userMenu.contains(e.relatedTarget);
            
            if (!isLeavingToMenu) {
                leaveTimer = setTimeout(() => {
                    userMenu.classList.remove('opacity-100', 'visible');
                    userMenu.classList.add('opacity-0', 'invisible');
                }, 300);
            }
        });

        userMenu.addEventListener('mouseenter', function() {
            clearTimeout(leaveTimer);
        });

        userMenu.addEventListener('mouseleave', function() {
            leaveTimer = setTimeout(() => {
                userMenu.classList.remove('opacity-100', 'visible');
                userMenu.classList.add('opacity-0', 'invisible');
            }, 300);
        });
    }
    
    // Helper functions
    function filterByDay(day) {
        const dayMap = {
            'SENIN': 'Senin',
            'SELASA': 'Selasa',
            'RABU': 'Rabu',
            'KAMIS': 'Kamis',
            'JUMAT': 'Jumat'
        };
        
        const targetDay = dayMap[day] || day;
        let visibleRows = 0;
        
        tableRows.forEach(row => {
            const dayCell = row.querySelector('td:nth-child(2) span');
            if (dayCell && dayCell.textContent.trim().toLowerCase() === targetDay.toLowerCase()) {
                row.style.display = '';
                visibleRows++;
            } else {
                row.style.display = 'none';
            }
        });
        
        updateRowCount(visibleRows);
        showNotification(`Menampilkan jadwal hari ${targetDay}`);
    }
    
    function updateRowCount(count) {
        const footerText = document.querySelector('.text-sm.text-gray-500');
        if (footerText) {
            footerText.textContent = `Menampilkan ${count} dari 30 jadwal`;
        }
    }
    
    function showNotification(message) {
        // Remove existing notification
        const existingNotification = document.querySelector('.notification-toast');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = 'notification-toast fixed top-4 right-4 bg-white border-l-4 border-[#004643] shadow-lg rounded-r-lg p-4 z-50 transform translate-x-full opacity-0 transition-all duration-300';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[#004643]">
                    check_circle
                </span>
                <span class="font-medium text-[#004643]">${message}</span>
            </div>
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