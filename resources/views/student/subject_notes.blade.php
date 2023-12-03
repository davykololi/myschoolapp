@extends('layouts.student')
 
@section('title')
    {{ $subjectTeacher->subject->name }} {{ __('Notes By')}} {{ $subjectTeacher->teacher->salutation }} {{ $subjectTeacher->teacher->full_name }}
@endsection

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
                    <div>
                        <h1 class="uppercase text-center font-hairline text-2xl mb-4">
                            {{ $user->stream->name}} Notes
                        </h1>
                        <h3 class="uppercase text-center font-hairline text-base">
                            {{ $subjectTeacher->subject->name }} Notes By {{ $subjectTeacher->teacher->salutation }} {{ $subjectTeacher->teacher->full_name }}
                        </h3>
                    </div>
                    <div class="text-right">
                        <x-back-button/>
                    </div>
                    <div>
                        <ol>
                            @forelse($subjectTeacher->teacher->notes as $note)
                            @if(($note->stream->id === $user->stream->id))
                            <li>
                                <span class="text-blue-500">{{$note->desc}}</span> - By
                                <a href="{{route('student.teacher.details',[$note->teacher->id,Auth::user()->stream->id])}}">
                                    {{$note->teacher->salutation}} {{$note->teacher->full_name}} <span class="text-green-800">{{$note->teacher->phone_no}}</span>
                                </a>
                                <a href="{{route('student.notes.download',$note->id)}}">Download</a>
                            </li>
                            @endif
                            @empty
                                <p class="text-[red]">
                                    {{ $user->stream->name}} {{ $subject->name }} Notes Notyet Uploaded.
                                </p>
                            @endforelse
                        </ol>
                    </div>
  </x-frontend-main>
@endsection






