<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-frontend-head/>
<body class="font-sans antialiased bg-gray-100 dark:bg-slate-800">
    <x-general-navbar/>
    <x-general-header/>
    <x-general-layouts-container> <!-- the container -->
        @yield('content')
    </x-general-layouts-container>
    <x-general-footer/>
      @include('partials.frontend_scripts')
    </div>
</body>
</html>
