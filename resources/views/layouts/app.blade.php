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

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Color de fondo de las paginas -->
    <div class="relative min-h-screen bg-orange-50" style="background: url('{{ asset('images/Aiudaaaa.jpg') }}') no-repeat center center fixed; background-size: cover;">
        <!-- Barra de navegación -->
        <div class="relative z-10">
            @include('layouts.navigation')
        </div>

        <!-- Barra donde indica la página donde te encuentras -->
        @isset($header)
            <header class="bg-blue-900">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-blue-900 text-white py-4 mt-4">
            <div class="max-w-7xl mx-auto text-center">
                <p>&copy; {{ date('Y') }} {{ config('DigitalSoundSculpt', 'DigitalSoundSculpt') }}. Todos los derechos reservados.</p>
                <p>Desarrollado por Software Solutions &reg;</p>
            </div>
        </footer>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
