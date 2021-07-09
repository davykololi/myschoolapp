@extends('layouts.admin')
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
            <a href="{{ route('admin.clubs.index') }}" class="label label-primary pull-right"> Back</a>
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
            {{ $club->reg_date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Teachers:</strong>
            <ol>
            @forelse($club->teachers as $teacher)
                <li>{{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }}</li>
            @empty
            <p>No teachers(s) assigned to this club yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Substaffs:</strong>
            <ol>
            @forelse($club->staffs as $staff)
                <li>{{ $staff->title }} {{ $staff->full_name }} {{ $staff->phone_no }}</li>
            @empty
            <p>No substaff(s) assigned to this club yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Students:</strong>
            <ol>
            @forelse($club->students as $student)
                <li>{{ $student->full_name }} {{ $student->standard->name }}</li>
            @empty
            <p>No student(s) assigned to this club yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $club->name }} Meetings:</strong>
            <ol>
            @forelse($club->meetings as $meeting)
                <li>{{ $meeting->name }} Date: {{ $meeting->date }} Agenda: {{ $meeting->agenda }}</li>
            @empty
            <p>No meeting(s) assigned to this club yet.</p>
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
    @include('club.detachstudentform')
    @include('club.attachteacherform')
    @include('club.detachteacherform')
    @include('club.attachstaffform')
    @include('club.detachstaffform')
    @include('club.attachmeetingform')
    @include('club.detachmeetingform')
</div>
</main>
@endsection
