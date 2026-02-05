<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Piket')</title>
    
    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Google Material Symbols (SEMUA ICON) -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    />

    @vite('resources/css/app.css')
</head>

</head>
<body class="bg-[#ABD1C6] font-['Poppins']">

    {{-- Header --}}
    @include('header.header')

    {{-- Navbar --}}
    @include('navbar.navbar')
    {{-- CONTENT --}}
    <main class="py-10">
        @yield('content')
    </main>

</body>
</html>
