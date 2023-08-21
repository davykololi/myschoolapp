@extends('layouts.frontend')
  
@section('content')
  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">ENTER AND SUBMIT THE CODE</h1>
      <x-2fa-mail-message/>
      @include('partials.errors')
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('admin.2fa.store') }}">
        <x-admin2fa-form/>
      </form>
    </div>
  </x-auth-card>
@endsection
