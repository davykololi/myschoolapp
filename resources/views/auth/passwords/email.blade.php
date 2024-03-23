@extends('layouts.frontend')
@section('title', '| Reset Email Address')

@section('content')
<!-- frontend-main view -->
<x-auth-card>
<div class="max-w-screen py-4 h-fit">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="">
                <div class="text-center text-white text-2xl uppercase font-bold">{{ __('Reset Password') }}</div>

                <div class="mt-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="w-full bg-transparent p-2 mb-6 text-indigo-700 border-white outline-none focus:bg-white rounded py-2 placeholder-sky-500 font-bold text-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="justify-center mt-8">
                                <button type="submit" class="bg-blue-700 text-white hover:text-black hover:bg-white px-4 py-1 rounded w-full">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-auth-card>
@endsection
