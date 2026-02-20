<!-- MODAL EDIT JURNAL -->
<div id="editScheduleForm" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="bg-[#004643] p-6 sticky top-0">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Edit Jurnal</h2>
                <button class="close-modal text-white hover:text-[#F9BC60] text-3xl">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <p class="text-white/80 mt-2" id="editScheduleId">ID: PKT-2026-001</p>
        </div>

        <!-- Content -->
        <div class="p-8">
            <form id="editJournalForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-schedule-id" name="schedule_id">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Kolom Kiri -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Nama User</label>
                            <input type="text" id="edit-name" readonly class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Nomor</label>
                            <input type="text" id="edit-no" readonly class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Divisi</label>
                            <input type="text" id="edit-class" readonly class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Tanggal</label>
                            <input type="date" id="edit-date" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Hari</label>
                            <select id="edit-day" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                                <option>Minggu</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Lokasi</label>
                            <input type="text" id="edit-location" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Jam Mulai</label>
                                <input type="time" id="edit-start-time" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Jam Selesai</label>
                                <input type="time" id="edit-end-time" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Deskripsi Tugas</label>
                            <textarea id="edit-description" rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none"></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Status</label>
                            <div class="flex gap-6">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="edit-status" value="Done" id="edit-status-done" class="w-5 h-5 text-[#004643]">
                                    <span class="font-medium">Done</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="edit-status" value="Pending" id="edit-status-pending" class="w-5 h-5 text-[#004643]">
                                    <span class="font-medium">Pending</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 mt-8 pt-6 border-t">
                    <button type="button" class="close-modal px-8 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-8 py-3 bg-[#004643] text-white font-bold rounded-xl hover:bg-[#003432] transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = document.getElementById('editScheduleForm');
    if (!editModal) return;
    
    const closeButtons = editModal.querySelectorAll('.close-modal');
    closeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            editModal.classList.remove('flex');
            editModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });
    });
});
</script>