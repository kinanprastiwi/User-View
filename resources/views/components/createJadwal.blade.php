<!-- MODAL CREATE JADWAL -->
<div id="createScheduleModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <!-- Header -->
        <div class="bg-[#004643] p-6 sticky top-0">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">Tambah Jadwal Baru</h2>
                <button class="close-create-modal text-white hover:text-[#F9BC60] text-3xl">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-8">
            <form id="createScheduleForm" method="POST" action="{{ route('admin.schedules.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div class="space-y-6">
                        <!-- Pilih User -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Nama User</label>
                            <select name="user_id" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} (No: {{ $user->id_number }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Pilih Divisi -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Divisi</label>
                            <select name="division_id" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                                <option value="">-- Pilih Divisi --</option>
                                @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Tanggal</label>
                            <input type="date" name="date" id="create-date" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                        </div>

                        <!-- Hari (Otomatis) -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Hari</label>
                            <input type="text" name="day" id="create-day" readonly class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none" placeholder="Senin">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-6">
                        <!-- Lokasi -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Lokasi</label>
                            <input type="text" name="location" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none" placeholder="Ruang IT - Lantai 2">
                        </div>

                        <!-- Waktu -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Jam Mulai</label>
                                <input type="time" name="start_time" value="07:00" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Jam Selesai</label>
                                <input type="time" name="end_time" value="08:00" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                            </div>
                        </div>

                        <!-- Deskripsi Tugas -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Deskripsi Tugas</label>
                            <textarea name="description" rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none" placeholder="Contoh: Membersihkan papan tulis, merapikan kursi, menyapu lantai"></textarea>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Status</label>
                            <select name="status" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#004643] outline-none">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Preview Ringkasan -->
                <div class="mt-8 p-6 bg-gray-50 rounded-2xl">
                    <h3 class="text-lg font-bold text-[#004643] mb-4">Ringkasan Jadwal</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Tanggal</p>
                            <p class="font-semibold" id="preview-date">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Hari</p>
                            <p class="font-semibold" id="preview-day">-</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Waktu</p>
                            <p class="font-semibold" id="preview-time">07:00 - 08:00</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="font-semibold" id="preview-status">Pending</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 mt-8 pt-6 border-t">
                    <button type="button" class="close-create-modal px-8 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-8 py-3 bg-[#004643] text-white font-bold rounded-xl hover:bg-[#003432] transition">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>