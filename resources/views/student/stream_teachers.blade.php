@extends('layouts.student')
 
@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4">
    <div class="text-center pb-12 uppercase">
        <h2 class="text-[#25215F] text-2xl font-bold dark:text-slate-400">
            {{ $user->stream->name}} Teachers
        </h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(!empty($streamSubjectTeachers))
        @forelse($streamSubjectTeachers as $streamSubjectTeacher)
        <div class="w-full border-2 glass rounded-lg p-12 flex flex-col justify-center items-center dark:bg-stone-700 dark:text-slate-400">
            <div class="mb-8">
                <a href="{{route('student.teacher.details',[$streamSubjectTeacher->teacher->id,Auth::user()->stream->id])}}">
                    <img class="object-center object-cover rounded-full h-48 w-48" src="{{ $streamSubjectTeacher->teacher->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $streamSubjectTeacher->teacher->full_name }}">
                </a>
            </div>
            <div class="">
                <p class="text-xl text-[#25215F] dark:text-slate-400 font-bold mb-2">
                    <a href="{{route('student.teacher.details',[$streamSubjectTeacher->teacher->id,Auth::user()->stream->id])}}">
                        {{ $streamSubjectTeacher->teacher->full_name }}
                    </a>
                </p>
                <p class="text-base text-dark dark:text-slate-400 font-normal">
                    {{ $streamSubjectTeacher->teacher->phone_no }}
                </p>
                <p class="text-base text-dark dark:text-slate-400 font-normal">
                    <a href="{{route('student.subject.notes',$streamSubjectTeacher->subject->id)}}">
                        <span class="animate-pulse uppercase">{{$streamSubjectTeacher->subject->name}}</span>
                    </a>
                </p>
            </div>
        </div>
        @empty
        <div class="w-full">No teachers assigned to {{ $user->stream->name}} at the moment.</div>
        @endforelse
        @endif
    </div>
</section>
  </x-frontend-main>
@endsection

