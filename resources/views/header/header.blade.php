<header class="w-full bg-white shadow-sm">
    <div class="flex items-center justify-between px-8 py-4">
        <div class="flex items-center gap-3">
           <div class="w-12 h-12 flex items-center justify-center">
            <span class="material-symbols-outlined text-[36px]">
            person_shield
            </span>
            </div>


            <div>
                <h1 class="font-semibold text-[#004643] text-[22px]">
                    Admin Dashboard
                </h1>
                <p class="text-sm text-gray-500 text-[14px] ">
                    Piket App
                </p>
            </div>
        </div>

        <form method="POST" action=" ">
            @csrf
           <button class="flex items-center gap-1 text-sm font-semibold text-gray-600 hover:text-gray-500">
    LOGOUT
    <span class="material-symbols-outlined text-[20px] leading-none">
        chevron_right
    </span>
</button>

        </form>
    </div>

     
</header>
