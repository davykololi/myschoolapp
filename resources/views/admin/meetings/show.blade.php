@extends('layouts.admin')
@section('title', '| Meeting Detalis')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $meeting->name }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.meetings.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $meeting->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code:</strong>
            {{ $meeting->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $meeting->date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Agenda:</strong>
            {{ $meeting->agenda }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Venue:</strong>
            {{ $meeting->venue }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Starting Time:</strong>
            {{ $meeting->start_at }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ending Time:</strong>
            {{ $meeting->end_at }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Teachers:</strong>
            <ol>
            @forelse($meetingTeachers as $teacher)
                <li>{{ $teacher->user->salutation }} {{ $teacher->user->full_name }} {{ $teacher->phone_no }}</li>
            @empty
            <p>No teacher(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Students:</strong>
            <ol>
            @forelse($meetingStudents as $student)
                <li>{{ $student->user->full_name }} {{ $student->stream->name }}</li>
            @empty
            <p>No student(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Subordinade Staff(s):</strong>
            <ol>
            @forelse($meetingSubordinates as $subordinate)
                <li>{{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }} {{ $subordinate->phone_no }}</li>
            @empty
            <p>No subordinade staff(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Class(es):</strong>
            <ol>
            @forelse($meetingStreams as $stream)
                <li>{{$stream->name}}</li>
            @empty
            <p>No class(es) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $meeting->name }} Club(s):</strong>
            <ol>
            @forelse($meetingClubs as $club)
                <li>{{$club->name}}</li>
            @empty
            <p>No club(s) assigned to {{ $meeting->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($meeting->created_at)) }}</span>
        </div>
    </div>
    @include('admin.meeting.attach_detach_teacherform')
    @include('admin.meeting.attach_detach_studentform')
    @include('admin.meeting.attach_detach_subordinateform')
    @include('admin.meeting.attach_detach_streamform')
    @include('admin.meeting.attach_detach_clubform')
</div>
</x-backend-main>
@endsection
