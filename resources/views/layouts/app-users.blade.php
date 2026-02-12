<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Piket - User')</title>
    
    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite('resources/css/app.css')
</head>
<body class="bg-[#ABD1C6] font-['Poppins'] min-h-screen">

    {{-- Header User --}}
    @include('user.header')

    {{-- Main Content --}}
    <main class="px-4 md:px-8 py-6 max-w-6xl mx-auto">
        @yield('content')
    </main>

</body>
</html>