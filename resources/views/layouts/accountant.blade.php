<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body class="font-sans antialiased">
    <x-accountant-navbar/>
    <x-accountant-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-general-footer/>
    @include('partials.frontend_scripts')
</body>
</html>
