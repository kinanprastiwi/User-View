@props(['id' => 'adminDetailModal'])

<div id="{{ $id }}" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="bg-[#004643] p-6 flex-shrink-0">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white">Detail Jadwal</h2>
                    <p class="text-white/80 mt-2" id="modalScheduleId-{{ $id }}">ID: PKT-2026-001</p>
                </div>
                <button class="close-modal text-white hover:text-[#F9BC60] text-3xl">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Kiri (2 kolom) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Informasi Jadwal -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-[#004643] mb-4">Informasi Jadwal</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-xl">
                                <p class="text-gray-500 text-sm">Lokasi</p>
                                <p class="text-lg font-bold text-[#004643]" id="modalLocation-{{ $id }}">-</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl">
                                <p class="text-gray-500 text-sm">Tanggal</p>
                                <p class="text-lg font-bold text-[#004643]" id="modalDate-{{ $id }}">-</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl">
                                <p class="text-gray-500 text-sm">Status</p>
                                <p class="text-lg font-bold" id="modalStatus-{{ $id }}">-</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl">
                                <p class="text-gray-500 text-sm">Waktu</p>
                                <p class="text-lg font-bold text-[#004643]" id="modalTime-{{ $id }}">-</p>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Tugas -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-[#004643] mb-4">Deskripsi Tugas</h3>
                        <div id="modalDescription-{{ $id }}" class="bg-white p-4 rounded-xl text-gray-700">
                            -
                        </div>
                    </div>

                   

                <!-- Kanan (1 kolom) -->
                <div class="lg:col-span-1 space-y-6">
                    <h3 class="text-xl font-bold text-[#004643]">Gambar Terupload</h3>
                    
                    <!-- Foto Sebelum -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-semibold text-[#004643] mb-4">Foto Sebelum</h4>
                        <div id="photoBeforeContainer-{{ $id }}" class="w-full aspect-square border-2 border-dashed border-gray-300 rounded-2xl overflow-hidden bg-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-6xl text-gray-300">image</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2 text-center" id="photoBeforeStatus-{{ $id }}">Belum ada foto</p>
                    </div>
                    
                    <!-- Foto Sesudah -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-semibold text-[#004643] mb-4">Foto Sesudah</h4>
                        <div id="photoAfterContainer-{{ $id }}" class="w-full aspect-square border-2 border-dashed border-gray-300 rounded-2xl overflow-hidden bg-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-6xl text-gray-300">image</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2 text-center" id="photoAfterStatus-{{ $id }}">Belum ada foto</p>
                    </div>
                </div>
            </div>
        </div>

       
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('{{ $id }}');
    if (!modal) return;
    
    const closeButtons = modal.querySelectorAll('.close-modal');
    
    closeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });
    });
});
</script>