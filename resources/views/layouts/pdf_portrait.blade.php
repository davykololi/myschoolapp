<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_portrait_head')
</head>
<body>
	<!-- Define header and footer blocks before your content -->
    @include('partials.pdf_portrait_header')
    @include('partials.school_portrait_logo')
    @include('partials.pdf_portrait_school_footer')
    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        @yield('content')
    </main>
    @include('partials.pdf_portrait_scripts')
</body>
</html>
