<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-frontend-head/>
<body class="font-sans antialiased font-family-karla">
    <x-general-navbar/>
    <x-user-headers/>
    <x-general-header/>
    <x-sticky-social-sharing/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-general-footer/>
    <x-back-to-top-button/>
    <x-frontend-scripts/>
    <x-current-date-time-script/>
</body>
</html>
