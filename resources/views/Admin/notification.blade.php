<!-- Notification Section (Hidden) -->
<div id="notifications-section" class="content-section hidden">
    <h2 class="text-2xl font-bold text-[#004643] mb-6">Notification</h2>
    
    <div class="bg-white rounded-2xl shadow-xl p-6">
        <div class="space-y-4">
            @forelse($recentReports as $report)
            <div class="flex items-start gap-4 p-4 {{ $report->status == 'pending' ? 'bg-yellow-50' : 'bg-green-50' }} rounded-xl">
                <div class="w-10 h-10 {{ $report->status == 'pending' ? 'bg-yellow-500' : 'bg-green-500' }} rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-white">
                        {{ $report->status == 'pending' ? 'pending' : 'check_circle' }}
                    </span>
                </div>
                <div>
                    <p class="font-semibold">Laporan dari {{ $report->user->name ?? 'User' }}</p>
                    <p class="text-sm text-gray-600">{{ Str::limit($report->activity_description, 50) }}</p>
                    <p class="text-xs text-gray-400 mt-1">{{ $report->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-4">Tidak ada notifikasi</p>
            @endforelse
        </div>
    </div>
</div>