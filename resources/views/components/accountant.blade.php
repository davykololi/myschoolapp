<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body>
    <x-accountant-navbar/>
    <x-accountant-header/>
    <x-general-layouts-container> <!-- the container -->
        {{ $slot }}
    </x-general-layouts-container>
    <x-general-footer/>
    @include('partials.frontend_scripts')
</body>
</html>
