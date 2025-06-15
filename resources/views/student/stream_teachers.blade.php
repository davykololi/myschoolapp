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
                <h2 class="text-2xl font-bold dark:text-slate-400 rounded underline">
                    {{ $user->student->stream->name}} Teachers
                </h2>
            </div>

            <div class="border border-groove rounded-md mb-4">
                <div>
                    <span class="mx-4">{{ __('TIMETABLE')}}</span>
                    <span>{{ $filteredTimetable }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @if(!empty($streamSubjects))
                @forelse($streamSubjects as $streamSubject)
                <a href="{{route('student.subject.notes',[$streamSubject->subject->id,$streamSubject->teacher->id])}}">
                <div class="w-full bg-transparent border rounded-lg p-12 flex flex-col justify-center items-center dark:bg-stone-700 dark:text-slate-400">
                    <div class="mb-8">
                        @if($streamSubject->teacher->gender === "Male")
                        <img class="object-center object-cover rounded-full h-48 w-48" src="{{ $streamSubject->teacher->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $streamSubject->teacher->user->full_name }}">
                        @elseif($streamSubject->teacher->gender === "Female")
                        <img class="object-center object-cover rounded-full h-48 w-48" src="{{ $streamSubject->teacher->image_url }}" onerror="this.src='{{asset('static/female_avatar.png')}}'" alt="{{ $streamSubject->teacher->user->full_name }}">
                        @endif
                    </div>
                    <div class="text-center">
                        <p class="text-xl text-[#25215F] dark:text-slate-400 font-bold mb-2">
                            {{ $streamSubject->teacher->user->full_name }}
                        </p>
                        <p class="text-base text-dark dark:text-slate-400 font-normal">
                            {{ $streamSubject->teacher->phone_no }}
                        </p>
                        <p class="text-base text-dark dark:text-slate-400 font-normal">
                            <span class="animate-pulse uppercase">{{$streamSubject->subject->name}}</span>
                        </p>
                    </div>
                </div>
                </a>
                @empty
                <div class="w-screen">
                    <p class="text-center">No teachers assigned to {{ $user->student->stream->name}} at the moment.</p>
                </div>
                @endforelse
                @endif
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection

