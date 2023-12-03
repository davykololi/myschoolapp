<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<x-general-head/>
<body>
  <main>
    @yield('content')
  </main>
<x-general-footer/>
<x-frontend-scripts/>
</body>
</html>