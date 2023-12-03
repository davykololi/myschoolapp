<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body>
    <x-staff-navbar/>
    <x-staff-header/>
    <x-general-layouts-container> <!-- the container -->   
        @yield('content')
    </x-general-layouts-container>
    <x-back-to-top-button/>
    <x-frontend-scripts/>
</body>
</html>
