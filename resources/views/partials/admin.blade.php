<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-backend-head/>
<body class="font-sans antialiased">
    <x-admin-navbar/>
    <x-general-layouts-container> <!-- the container -->
        {{ $slot }}
    </x-general-layouts-container>
    <x-admin-footer/>
    <x-general-script/>
    @include('partials.frontend_scripts')
</body>
</html>



