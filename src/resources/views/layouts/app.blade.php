<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if(auth()->user()->role==('admin'))
        @include('layouts.admin_nav')
        @else
        @include('layouts.navigation')

        @endif
        @if(session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        <script>
            setTimeout(function() {
                var successAlert = document.getElementById('success-alert');
                var errorAlert = document.getElementById('error-alert');
                if (successAlert) {
                    successAlert.style.display = 'none';
                }
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }, 3000); // 3 secondes
        </script>




        <div>
            @yield('content')
        </div>

    </div>


    <script>
        window.User = {
            id: '{{optional(auth()->user())->id}}',
        }
    </script>



</body>

</html>