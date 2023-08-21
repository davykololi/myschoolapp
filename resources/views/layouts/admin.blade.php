<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-backend-head/>
<body class="font-sans antialiased">
    <x-admin-navbar/>
    <x-admin-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-admin-footer/>
    @include('partials.frontend_scripts')
</body>
</html>



