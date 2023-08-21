<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-backend-head/>
<body class="font-sans antialiased bg-gray-200">
    <x-superadmin-navbar/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-superadmin-footer/>
      @include('partials.frontend_scripts')
    </div>
</body>
</html>



