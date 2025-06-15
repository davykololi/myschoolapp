@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 ld:mx-8">
            <div class="mb-4">
                <h1 class="uppercase font-bold text-2xl text-center tracking-tighter">
                    {{ $user->student->stream->name}} Students
                </h1>
            </div> 
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                @foreach($streamStudents as $student)
                <div class="w-full pt-4 rounded bg-stone-400 dark:bg-gray-500 dark:text-slate-400">
                    <div class="px-4 md:px-0">
                        @if($student->user->gender === "Male")
                        <img class="w-full h-fit md:w-48 md:h-48 mx-auto rounded border-double border-8 border-yellow-800 bg-gray-800" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'">
                        @endif
                        @if($student->user->gender === "Female")
                        <img class="w-full h-fit md:w-48 md:h-48 mx-auto rounded border-double border-8 border-yellow-800 bg-gray-800" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/female_avatar.png')}}'">
                        @endif
                    </div>
                    <div class="bg-gray-500 mt-2 pt-2 pb-4 text-sm h-14 items-center justify-center text-white font-serif dark:bg-black dark:text-slate-400 w-full">
                        <p class="mx-auto text-center uppercase">{{ $student->user->full_name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection


