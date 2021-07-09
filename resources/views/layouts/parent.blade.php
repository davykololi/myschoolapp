<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
<body style="height: 100%">
    <div id="app">
      @include('partials.parent_navbar')
      @include('partials.multi_header')
        <main class="py-4">
            @yield('content')
        </main>
      @include('partials.scripts')
    </div>
</body>
</html>
