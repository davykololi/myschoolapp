@extends('layouts.superadmin')
@section('title', '| Club Details')

@section('content')
@role('superadmin')
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
        @include('partials.messages')
        @include('partials.errors')
        <div class="">
            <div class="mt-8">
                <h2 class="uppercase text-center text-2xl font-bold">{{ $club->name }} Details</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Club Name:</strong>
                {{ $club->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Club Code:</strong>
            {{ $club->code }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Registration Date:</strong>
                {{ $club->regDate() }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $club->name }} Teachers:</strong>
                <ol>
                @forelse($clubTeachers as $teacher)
                    <li>
                        {{ $teacher->user->salutation }} {{ $teacher->user->full_name }} {{ $teacher->phone_no }}
                    </li>
                @empty
                <p>No teachers(s) assigned to {{ $club->name }} yet.</p>
                @endforelse
                </ol>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $club->name }} Substaffs:</strong>
                <ol>
                @forelse($clubSubordinates as $clubSubordinate)
                <a href="{{route('superadmin.subordinates.show',$clubSubordinate->id)}}">
                    <li>
                        {{ $clubSubordinate->user->salutation }} {{ $clubSubordinate->user->full_name }} - {{ $clubSubordinate->phone_no }}
                    </li>
                </a>
                @empty
                <p>No substaff(s) assigned to {{ $club->name }} yet.</p>
                @endforelse
                </ol>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $club->name }} Students:</strong>
                <ol>
                @forelse($clubStudents as $student)
                    <li>{{ $student->user->full_name }} - {{ $student->stream->name }}</li>
                @empty
                <p>No student(s) assigned to {{ $club->name }} yet.</p>
                @endforelse
                </ol>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $club->name }} Meetings:</strong>
                <ol>
                @forelse($clubMeetings as $meeting)
                    <li>
                        {{ $meeting->name }} will be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda will be {{ $meeting->agenda }}
                    </li>
                @empty
                <p>No meeting(s) assigned to {{ $club->name }} yet.</p>
                @endforelse
                </ol>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span>
                    <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($club->created_at)) }}</span>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-4 mb-4">
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.attach_student_form')
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.detach_student_form') 
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-4 mb-4">
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.attach_teacher_form')
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.detach_teacher_form')
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-4 mb-4">
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.attach_subordinate_form')
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.detach_subordinate_form') 
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-4 mb-4">
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.attach_meeting_form')
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2">
                @include('superadmin.club.detach_meeting_form')
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
