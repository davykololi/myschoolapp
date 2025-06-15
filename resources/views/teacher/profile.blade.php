@extends('layouts.teacher')
@section('title', '| Teacher Profile')

@section('content')
@role('teacher')
    <!-- frontend-main view -->
    <x-frontend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h1 style="text-transform: uppercase;">My Profile</h1>
            <br/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <x-user-profile-avatar/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->salutation }} {{ $user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $user->teacher->position->value }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID No.</strong>
            {{ $user->teacher->id_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Emp. No.:</strong>
            {{ $user->teacher->emp_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $user->teacher->getDob() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
             {{ $user->teacher->age }} Years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation:</strong>
            {{ $user->teacher->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Current Postal Address:</strong>
            {{ $user->teacher->current_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permanent Postal Address:</strong>
            {{ $user->teacher->permanent_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.</strong>
            {{ $user->teacher->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subjects Assigned:</strong>
            @forelse($teacherStreamSubjects as $strmSubTeacher)
            <ul>
                <li><b>{{ $strmSubTeacher->subject->name }}</b> - <i>{{ $strmSubTeacher->stream->name }}</i>.</li>
            </ul>
            @empty
            <p style="color: red">The subject(s) have notyet been assigned to you.</p>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Departments:</strong>
            @forelse($user->teacher->departments as $dept)
                {{$dept->name}},
            @empty
            <span style="color: red">Notyet assigned to any department.</span>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clubs:</strong>
            @forelse($user->teacher->clubs as $club)
                {{$club->name}},
            @empty
            <span style="color: red">You haven't joined any club.</span>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Meetings:</strong>
            <ol>
            @forelse($user->teacher->meetings as $meeting)
                <li>{{$meeting->name}} to be held on {{$meeting->getDate()}} at {{$meeting->venue}}. <span style="color: green">Agenda:</span> {{$meeting->agenda}}.</li>
            @empty
            <span style="color: red">Notyet assigned to any meeting(s) at the moment.</span>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
