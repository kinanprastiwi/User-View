<header class="w-full bg-white shadow-sm">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center bg-[#004643] rounded-xl">
                <span class="material-symbols-outlined text-white text-[28px]">
                    cleaning_services
                </span>
            </div>
            <div>
                <h1 class="font-bold text-2xl text-[#004643]">Halaman Utama</h1>
                <p class="text-gray-600">Aplikasi Piket</p>
            </div>
        </div>
         <!-- Header dengan User Info -->
    <div class="flex justify-between items-center mb-8">
        <!-- User Dropdown -->
        <div class="relative group">
            <div class="flex items-center gap-3 bg-white px-5 py-3 rounded-xl shadow-lg cursor-pointer hover:shadow-xl transition-all border border-gray-200">
                <div class="w-10 h-10 bg-[#F9BC60] rounded-full flex items-center justify-center">
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

            <!-- Dropdown Menu -->
            <div class="absolute right-0 top-full mt-2 w-64 bg-white rounded-xl shadow-2xl border border-gray-200 z-50 
                       opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                       transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0">
                <!-- User Info -->
                <div class="p-5 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#F9BC60] rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-[#004643] text-xl">
                                person
                            </span>
                        </div>
                        <div>
                            <p class="font-bold text-[#004643]">Budi Santoso</p>
                            <p class="text-sm text-gray-500">XII RPL</p>
                            <p class="text-xs text-gray-400 mt-1">ID: USR-001</p>
                        </div>
                    </div>
                </div>

                <!-- Logout -->
                <div class="p-5 border-t border-gray-100">
                    <a href="#" class="flex items-center justify-center gap-2 px-4 py-3 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-100 transition-colors w-full">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        LOGOUT
                    </a>
                </div>
</header>