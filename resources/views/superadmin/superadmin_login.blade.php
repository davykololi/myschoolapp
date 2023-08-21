<x-frontend><!-- The layout -->
  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">LOGIN</h1>
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('superadmin.login.submit') }}" id="login-form">
        <x-login-form-details/>
        <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">
          <a title="Lost Password" href="{{ route('superadmin.password.request') }}" class="lg:hover:text-white">Forgot Password ?</a>
        </span>
      </form>
    </div>
  </x-auth-card>
</x-frontend>
