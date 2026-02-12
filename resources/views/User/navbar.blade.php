<nav class="w-full bg-white shadow-sm mt-4">
    <div class="flex items-center justify-center px-6 py-3">
        <div class="flex items-center gap-8">
            <!-- Halaman Utama -->
            <a href="{{ route('user.dashboard') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200
                      {{ request()->routeIs('user.dashboard') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-[#004643] hover:bg-gray-100 hover:shadow-sm' }}">
                <span class="material-symbols-outlined">
                    home
                </span>
                Halaman Utama
            </a>

            <!-- Jadwal -->
            <a href="{{ route('user.jadwal') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200
                      {{ request()->routeIs('user.jadwal') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-[#004643] hover:bg-gray-100 hover:shadow-sm' }}">
                <span class="material-symbols-outlined">
                    schedule
                </span>
                Jadwal
            </a>

           

            <!-- Laporan -->
            <a href="{{ route('user.laporan') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-200
                      {{ request()->routeIs('user.laporan') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-[#004643] hover:bg-gray-100 hover:shadow-sm' }}">
                <span class="material-symbols-outlined">
                    description
                </span>
                Laporan
            </a>
        </div>
    </div>
</nav>