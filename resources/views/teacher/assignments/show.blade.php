@extends('layouts.teacher')
@section('title', '| Teacher Assignment Details')

@section('content')
@role('teacher')
    <!-- frontend-main view -->
    <x-frontend-main>
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ASSIGNMENT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('teacher.assignments.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $assignment->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Given To:</strong>
            @foreach($assignment->streams as $stream)
                <span style="color: green"><b>Stream(s):</b></span> {{$stream->name}}
            @endforeach
            @forelse($assignment->students as $student)
                <span style="color: green"><b>Student(s):</b></span> {{$student->user->full_name}},
            @endforeach
            @forelse($assignment->subordinates as $subordinate)
                <span style="color: green"><b> Sub Staff(s):</b></span> {{$subordinate->user->full_name}},
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Given:</strong>
            {{ $assignment->getDate() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deadline:</strong>
            {{ $assignment->getDeadline() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>File:</strong>
            <a href="{{route('teacher.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                Download
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($assignment->created_at)) }}</span>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
