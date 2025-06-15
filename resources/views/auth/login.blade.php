@extends('layouts.frontend')
@section('title', '| Login')

@section('content')
<!-- frontend-main view -->
<x-home-main>
  <x-auth-card>
    <div class="items-center justify-center mb-8">
      <h1 class="font-extrabold text-white text-center">LOGIN</h1>
    </div>
    <form method="POST" action="{{ route('login') }}">
      <x-login-form-details/>
    </form>
    <footer>
      <a href="{{ route('password.request') }}" class="text-white hover:text-pink-700 text-sm float-left">Forgot Password?</a>
    </footer> 
  </x-auth-card>
</x-home-main>
@endsection
