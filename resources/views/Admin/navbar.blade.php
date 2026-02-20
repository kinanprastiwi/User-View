<nav class="bg-white shadow-sm mt-2 sticky top-[72px] z-40">
    <div class="container mx-auto px-6 py-3 max-w-7xl">
        <div class="flex items-center justify-center gap-2">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.dashboard') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>
            
            <a href="{{ route('admin.users.index') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.users.*') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">groups</span>
                Users
            </a>
            
            <a href="{{ route('admin.schedules.index') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.schedules.*') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">schedule</span>
                Jadwal
            </a>
            
            <a href="{{ route('admin.reports.index') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.reports.*') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">description</span>
                Laporan
            </a>
            
            <a href="{{ route('admin.divisions.index') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.divisions.*') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">category</span>
                Divisi
            </a>
            
            <a href="{{ route('admin.stats.index') }}" 
               class="flex items-center gap-2 px-6 py-3 rounded-xl font-medium transition-all duration-200
                      {{ request()->routeIs('admin.stats.*') 
                         ? 'bg-[#004643] text-white shadow-md' 
                         : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="material-symbols-outlined">monitoring</span>
                Statistik
            </a>
        </div>
    </div>
</nav>