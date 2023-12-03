<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_landscape_marksheet')
</head>
<body>
	<!-- Define header and footer blocks before your content -->
    @include('partials.pdf_marksheet_header')
    @include('partials.school_landscape_logo')
    @include('partials.pdf_landscape_marksheet_footer')
    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        @yield('content')
    </main>
    @include('partials.pdf_landscape_scripts')
</body>
</html>
