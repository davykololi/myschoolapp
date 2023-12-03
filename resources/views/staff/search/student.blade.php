@extends('layouts.staff')

@section('content') 
  <!-- frontend-main view -->
  <x-frontend-main>
    @can('schoolSecretary')
    <div class="max-w-screen h-fit">
        <div class="full">
            <div class="-mt-8">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $student->full_name }} Profile</h2>
                </div>
                <div class="mt-4 w-full">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col md:flex-row lg:flex-row mt-8 bg-gray-700 mx-4 md:mx-8 text-white md:rounded dark:bg-stone-500">
            <div class="w-full flex-auto md:w-1/3 lg:w-1/3">
                <img class="w-full md:w-64 md:h-64 border-2 p-4" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'">
            </div>
            <div class="w-full flex-auto md:w-2/3 lg:w-2/3 ml-4 mt-4">
                <h3 class="underline uppercase font-extrabold">{{ __('Student Details') }}</h3>
                <p><span class="font-bold">ADM NO: </span>{{ $student->admission_no }}</p>
                <p><span class="font-bold">STREAM: </span>{{ $student->stream->name }}</p>
                <p><span class="font-bold">DOA: </span>{{ $student->doa }}</p>

                <h4 class="mt-2 underline uppercase font-extrabold">{{ __('Parent Details') }}</h4>
                <p><span class="font-bold">NAME: </span>{{ $student->parent->salutation }} {{ $student->parent->name}}</p>
                <p><span class="font-bold">ID NO: </span>{{ $student->parent->id_no }}</p>
                <p><span class="font-bold">PHONE: </span>{{ $student->parent->phone_no }}</p>
            </div>
        </div>
    </div>
    @endcan
</x-frontend-main>
@endsection


