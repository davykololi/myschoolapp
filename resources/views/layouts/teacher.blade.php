<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-general-head/>
<body class="font-sans antialiased bg-gray-200">
    <x-teacher-navbar/>
    <x-teacher-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-general-footer/>
      @include('partials.frontend_scripts')
    </div>
</body>
</html>
