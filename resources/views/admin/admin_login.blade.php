<x-frontend><!-- The layout -->
  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">LOGIN</h1>
      @include('partials.errors')
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('admin.login.submit') }}">
        <x-login-form-details/>
        <login-span>
          <a title="Lost Password" href="{{ route('admin.password.request') }}" class="lg:hover:text-white">Forgot Password ?</a>
        </login-span>
      </form>
    </div>
  </x-auth-card>
</x-frontend>
