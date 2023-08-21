@extends('layouts.superadmin')
@section('title', '| Show Club')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $club->name }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{route('admin.club.students',$club->id)}}" class="btn btn-primary btn-border">
                {{ $club->name }} Students PDF
            </a>
            <a href="{{route('admin.club.teachers',$club->id)}}" class="btn btn-primary btn-border">
                {{ $club->name }} Teachers PDF
            </a>
            <br/>
            <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
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
            @forelse($club->teachers as $teacher)
            <a href="{{route('admin.teachers.show',$teacher->id)}}">
                <li>{{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }}</li>
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
            @forelse($club->staffs as $staff)
            <a href="{{route('admin.staffs.show',$staff->id)}}">
                <li>{{ $staff->title }} {{ $staff->name }} - {{ $staff->phone_no }}</li>
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
            @forelse($club->students as $student)
            <a href="{{route('admin.students.show',$student->id)}}">
                <li>{{ $student->full_name }} {{ $student->stream->name }}</li>
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
            @forelse($club->meetings as $meeting)
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
    @include('club.attachstudentform')
    @include('club.attachteacherform')
    @include('club.attachstaffform')
    @include('club.attachmeetingform')
</div>
</main>
@endsection
