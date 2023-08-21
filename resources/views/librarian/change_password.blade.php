@extends('layouts.librarian')
@section('title', '| Librarian Change Password')

@section('content')
  <!-- frontend-main view -->
  <x-change-password-main>
    <div class="">
      <div class="pt-2 px-4 text-center">
        <h1 class="font-extrabold text-white justify-center">CHANGE PASSWORD</h1>
      </div>
      <div class="px-2">
        @include('partials.errors')
        @include('partials.messages')
      </div>
      <div class="flex w-auto justify-center py-10 items-center">
        <form method="POST" action="{{ route('librarian.change-password.save') }}">
          <x-change-password/>
        </form>
      </div>
  </div>
  </x-change-password-main>
@endsection
