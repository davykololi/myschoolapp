@extends('layouts.frontend')
@section('title', '| Matron Reset Password Email')

@section('content')
<div class="flex flex-col lg:flex-row flex-nowrap">
  <!-- frontent-sidebar -->
  <x-frontend-sidebar>
    <x-login-links/>
  </x-frontend-sidebar>

  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">RESET PASSWORD EMAIL</h1>
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('matron.password.email') }}">
        <x-reset-password-email-form/>
      </form>
    </div>
  </x-auth-card>
</div>  
@endsection
