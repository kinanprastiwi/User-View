@extends('layouts.app')
  
@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-6xl mx-auto">

        <div class="flex justify-end mb-5">
    <button
        class="flex items-center gap-2 h-10 bg-white font-medium rounded-xl
               text-[#004643] text-[15px] px-4 shadow"
    >
        <span class="material-symbols-outlined text-[20px]">
            add
        </span>
        Add Journal
    </button>
</div>


    {{-- CARD TABLE --}}
    <div class="bg-white rounded-xl shadow-[0_10px_25px_rgba(0,0,0,0.12)] p-6">
      <div class="relative w-full mb-4">
    <input
        type="text"
        placeholder="Filter details... (cari nama, kelas, atau absen)"
        class="w-full border rounded-full pr-12 pl-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#ABD1C6]"
    >

    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
        search
    </span>
</div>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Nama</th>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="py-2">Naysa Tiyona</td>
                    <td>6</td>
                    <td>12 RPL</td>
                    <td>Membersihkan papan tulis</td>
                    <td>
                        <span class="px-3 py-1 rounded-full bg-green-200 text-xs">
                            Done
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
