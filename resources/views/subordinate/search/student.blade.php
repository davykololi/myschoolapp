@extends('layouts.subordinate')

@section('title')
| {{ Auth::user()->subordinate->position->value }} : {{ $student->user->full_name }} {{ __('Profile') }}
@endsection

@section('content') 
@role('subordinate')
<!-- frontend-main view -->
<x-frontend-main>
@can('schoolSecretary')
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div>
            <div class="mx-2 md:mx-8 lg:mx-8">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $student->user->full_name }} Profile</h2>
                </div>
                <div class="mt-4 w-full">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col md:flex-row lg:flex-row mt-8 mx-4 md:mx-24">
            <div class="w-full flex-auto md:w-1/4 lg:w-1/4">
                @if($student->gender === "Male")
                <img class="w-full md:w-64 md:h-64 border-2 p-4 bg-gray-700" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'">
                @elseif($student->gender === "Female")
                <img class="w-full md:w-64 md:h-64 border-2 p-4 bg-gray-700" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
                @endif
            </div>
            <div class="w-full flex-auto md:w-3/4 lg:w-3/4 mt-4">
                <h3 class="underline uppercase font-extrabold md:-mt-4">{{ __('Student Details') }}</h3>
                <p><span class="font-bold">ADM NO: </span>{{ $student->admission_no }}</p>
                <p><span class="font-bold">STREAM: </span>{{ $student->stream->name }}</p>
                <p><span class="font-bold">DOA: </span>{{ $student->doa }}</p>

                <h4 class="mt-2 underline uppercase font-extrabold">{{ __('Parent Details') }}</h4>
                <p><span class="font-bold">NAME: </span>{{ $student->parent->user->salutation }} {{ $student->parent->user->full_name}}</p>
                <p><span class="font-bold">ID NO: </span>{{ $student->parent->id_no }}</p>
                <p><span class="font-bold">PHONE: </span>{{ $student->parent->phone_no }}</p>
            </div>
        </div>
    </div>
</div>
@endcan
</x-frontend-main>
@endrole
@endsection


