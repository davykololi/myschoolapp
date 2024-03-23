@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:h-min-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="text-center pb-12 uppercase w-full">
                <h2 class="text-[#25215F] text-2xl font-bold dark:text-slate-400 rounded md:mx-96">
                    {{ $user->student->stream->name}} Teachers
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @if(!empty($streamSubjects))
                @forelse($streamSubjects as $streamSubject)
                <div class="w-full bg-[#fefefe] border glass rounded-lg p-12 flex flex-col justify-center items-center dark:bg-gray-800 dark:text-slate-400">
                    <div class="mb-8">
                        <a href="{{route('student.teacher.details',[$streamSubject->teacher->id,Auth::user()->student->stream->id])}}">
                            <img class="object-center object-cover rounded-full h-48 w-48" src="{{ $streamSubject->teacher->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $streamSubject->teacher->user->full_name }}">
                        </a>
                    </div>
                    <div class="">
                        <p class="text-xl text-[#25215F] dark:text-slate-400 font-bold mb-2">
                            <a href="{{route('student.teacher.details',[$streamSubject->teacher->id,Auth::user()->student->stream->id])}}">
                                {{ $streamSubject->teacher->user->full_name }}
                            </a>
                        </p>
                        <p class="text-base text-dark dark:text-slate-400 font-normal">
                            {{ $streamSubject->teacher->phone_no }}
                        </p>
                        <p class="text-base text-dark dark:text-slate-400 font-normal">
                            <a href="{{route('student.subject.notes',[$streamSubject->subject->id,$streamSubject->teacher->id])}}">
                                <span class="animate-pulse uppercase">{{$streamSubject->subject->name}}</span>
                            </a>
                        </p>
                    </div>
                </div>
                @empty
                    <div class="w-full">No teachers assigned to {{ $user->student->stream->name}} at the moment.</div>
                @endforelse
                @endif
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection

