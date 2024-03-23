@extends('layouts.frontend')
@section('title', '| Authentication Code')

@section('content')
<!-- frontend-main view -->
<x-home-main>
  <!-- frontend-main view -->
  <x-auth-card>
    <div class="px-4 text-center">
      <h2 class="font-extrabold text-white justify-center">{{$title}}</h2>
      <x-2fa-mail-message/>
      @include('partials.errors')
    </div>
    <div class="flex w-auto justify-center py-5 items-center">
      <form method="POST" action="{{ route('2fa.store') }}">
        @csrf 
        <x-2fa-code/>
      </form>
    </div>
    <div class="flex flex-row mb-4">
        <div class="w-1/2">
          <a href="{{ route('2fa.resend') }}" class="inline-block align-baseline font-bold text-sm text-white hover:text-teal-800 ml-4 cursor-pointer">
            Resend Code
          </a>
        </div>
        <div class="w-1/2">
          <x-logout-link/>
        </div>
    </div>
  </x-auth-card>
</x-home-main>
@endsection
