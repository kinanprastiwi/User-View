<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Aplikasi Piket')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite('resources/css/app.css')
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ABD1C6;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Untuk konten utama */
        main {
            min-height: 100vh;
            background-color: #ABD1C6;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <script>
        // Global notification function
        window.showNotification = function(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-white border-l-4 border-[#004643] shadow-2xl rounded-lg p-4 z-50 flex items-center gap-3 transform transition-all duration-300 translate-x-0 opacity-100';
            notification.innerHTML = `
                <span class="material-symbols-outlined text-[#004643]">${type === 'success' ? 'check_circle' : 'info'}</span>
                <span class="font-medium text-[#004643]">${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                notification.style.opacity = '0';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        };
    </script>
</body>
</html>