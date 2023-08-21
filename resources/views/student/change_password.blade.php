@extends('layouts.student')
@section('title', '| Student Change Password')

@section('content')
  <!-- frontend-main view -->
  <x-change-password-main>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">CHANGE PASSWORD</h1>
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('student.change-password.save') }}">
        <x-change-password/>
      </form>
    </div>
  </x-change-password-main>
@endsection
