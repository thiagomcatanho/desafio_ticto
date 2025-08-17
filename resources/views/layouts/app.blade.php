<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex">
    <div class="flex-1 min-h-screen flex flex-col">

        @include('layouts.partials.header')

        <main class="w-full px-4 pt-6">
            {{-- Flash messages --}}
            @if (session('status'))
                <x-alert :type="session('status_type', 'info')" :message="session('status')" />
            @endif

            @yield('content')

        </main>

    </div>

    @stack('scripts')
</body>

</html>
