<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body>
    @include('partials.staff_navbar')
    <x-staff-header/>
    <x-general-layouts-container> <!-- the container -->   
        @yield('content')
    </x-general-layouts-container>
    @include('partials.frontend_scripts')
</body>
</html>
