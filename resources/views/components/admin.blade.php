<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-backend-head/>
<body class="font-sans antialiased">
    <x-admin-navbar/>
    <x-admin-header/>
    <x-general-layouts-container> <!-- the container -->
        {{ $slot }}
    </x-general-layouts-container>
    <x-admin-footer/>
    <x-back-to-top-button/>
    <x-frontend-scripts/>
</body>
</html>



