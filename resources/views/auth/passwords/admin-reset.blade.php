@extends('layouts.frontend')
@section('title', '| Admin Reset Password')

@section('content')
<div class="flex flex-col lg:flex-row flex-nowrap">
  <!-- frontent-sidebar -->
  <x-frontend-sidebar>
    <x-login-links/>
  </x-frontend-sidebar>

  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">ADMIN RESET PASSWORD</h1>
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('admin.password.request') }}">
        <x-reset-password-form/>
      </form>
    </div>
  </x-auth-card>
</div>  
@endsection