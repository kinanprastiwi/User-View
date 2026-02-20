<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih User - Aplikasi Piket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#004643]">Pilih User</h1>
                <p class="text-gray-500 mt-2">Klik untuk login sebagai user tertentu</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $users = App\Models\User::with('division')->get();
                @endphp
                
                @foreach($users as $user)
                <a href="{{ route('set.user', $user->id) }}" 
                   class="block p-6 bg-gray-50 rounded-2xl hover:shadow-xl transition border-2 border-gray-200 hover:border-[#004643] group">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#004643] to-[#1a665c] rounded-full flex items-center justify-center text-white font-bold text-xl">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-bold text-[#004643] text-lg group-hover:text-[#F9BC60]">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $user->division->name ?? 'Divisi' }}</p>
                            <p class="text-xs text-gray-400 mt-1">ID: {{ $user->id }} | No: {{ $user->id_number }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            
            <div class="text-center mt-8">
                <a href="/user/dashboard" class="text-[#004643] hover:underline">
                    Kembali ke dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>