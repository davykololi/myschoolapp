<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body class="antialiased font-family-karla">
    <x-matron-navbar/>
    <x-matron-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-general-footer/>
    <x-back-to-top-button/>
    <x-frontend-scripts/>
</body>
</html>
