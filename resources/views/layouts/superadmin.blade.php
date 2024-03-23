<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-backend-head/>
<body class="antialiased bg-gray-200 font-family-karla">
    <x-superadmin-navbar/>
    <x-superadmin-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-superadmin-footer/>
    <x-back-to-top-button/>
    <x-frontend-scripts/>
</body>
</html>



