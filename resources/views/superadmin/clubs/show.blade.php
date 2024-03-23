@extends('layouts.superadmin')
@section('title', '| Club Details')

@section('content')
<main class="container max-w-screen">
    <div class="row">
    @include('partials.messages')
    <div class="">
        <div class="mt-8">
            <h2 class="uppercase text-center text-2xl font-bold">{{ $club->name }} Details</h2>
        </div>
    </div>
</div>
<div class="row">
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
            <a href="{{route('admin.teachers.show',$teacher->id)}}">
                <li>{{ $teacher->user->salutation }} {{ $teacher->user->full_name }} {{ $teacher->phone_no }}</li>
            </a>
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
            <a href="{{route('admin.students.show',$student->id)}}">
                <li>{{ $student->user->full_name }} - {{ $student->stream->name }}</li>
            </a>
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
            <a href="{{route('admin.meetings.show',$meeting->id)}}">
                <li>
                    {{ $meeting->name }} will be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda will be {{ $meeting->agenda }}
                </li>
            </a>
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
    @include('superadmin.club.attach_detach_studentform')
    @include('superadmin.club.attach_detach_teacherform')
    @include('superadmin.club.attach_detach_subordinateform')
    @include('superadmin.club.attach_detach_meetingform')
</div>
</main>
@endsection
