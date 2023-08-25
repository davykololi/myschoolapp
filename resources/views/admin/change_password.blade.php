@extends('layouts.admin')
@section('title', '| Admin Change Password')

@section('content')
<x-change-password-main>
    <div class="w-full pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">CHANGE PASSWORD</h1>
      @include('partials.errors')
    </div>
    <div class="w-full flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('admin.change-password.save') }}">
        <x-change-password/>
      </form>
    </div>
  </x-change-password-main>
@endsection