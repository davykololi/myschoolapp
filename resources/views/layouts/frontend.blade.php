<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.frontend_head')
<body>
    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
   @include('partials.headertop')
   @include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
      @include('shared.newsletter')
      @include('partials.footer')
      @include('partials.scripts')
    </div>
</body>
</html>



