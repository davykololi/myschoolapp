@extends('layouts.frontend')
@section('title', '| Student Login')

@section('content')
  <!-- frontend-main view -->
  <x-auth-card>
    @include('partials.login-title')
    <form method="POST" action="{{ route('student.login.submit') }}">
      <x-login-form-details/>
    </form>
    <footer>
      <a href="{{ route('student.password.request') }}" class="text-indigo-700 hover:text-pink-700 text-sm float-left">Forgot Password?</a>
    </footer> 
  </x-auth-card>
@endsection
