<x-frontend><!-- The layout -->
  <!-- frontend-main view -->
  <x-auth-card>
    <form method="POST" action="{{ route('teacher.login.submit') }}">
      <x-login-form-details/>
    </form>
    <footer>
      <a href="{{ route('teacher.password.request') }}" class="text-indigo-700 hover:text-pink-700 text-sm float-left">Forgot Password?</a>
    </footer> 
  </x-auth-card>
</x-frontend>
