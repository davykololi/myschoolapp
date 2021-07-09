@extends('layouts.teacher')
@section('title', '| Student')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">Student Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('teacher.std.show', $student->standard->id) }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $student->image }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $student->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{ $student->position_student->name }}, {{Auth::user()->school->name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Admission No.:</strong>
            {{ $student->admission_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ date("jS,F,Y",strtotime($student->dob)) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $student->age }} years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Class:</strong>
            {{ $student->standard->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $student->intake->name }} {{ \Carbon\Carbon::parse($student->intake->date)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory:</strong>
            {{ $student->dormitory->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $student->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Parent Info:</strong>
            <span style="color: green">Name:</span> {{ $student->parent->title }} {{ $student->parent->full_name }} 
            <span style="color: green">Phone:</span> {{ $student->parent->phone_no }}
            <span style="color: green">Job:</span> {{ $student->parent->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $student->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Subjects:</strong>
            <ol>
            @forelse($student->subjects as $subject)
                <li>{{ $subject->name }}</li>
            @empty
            <p>The subjects notyet assigned to {{ $student->full_name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Awards:</strong>
            <ol>
            @forelse($student->rewards as $reward)
                <li>{{ $reward->name }} <span style="color: blue">Purpose:</span> {{ $reward->purpose }}.</li>
            @empty
            <p>{{ $student->full_name }} has notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Individual Assignments:</strong>
            <ol>
            @forelse($student->assignments as $assignment)
                <li>
                    {{ $assignment->name }} {{ $assignment->file}} <span style="color: blue">Given:</span> 
                    {{ \Carbon\Carbon::parse($assignment->date)->format('d-m-Y') }} <span style="color: red">Deadline:</span> 
                    {{ \Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y') }} By: 
                    @foreach($assignment->teachers as $teacher)
                        {{$teacher->full_name}}.
                    @endforeach
                </li>
            @empty
            <p>{{ $student->full_name }} has not been given any assignment(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Clubs:</strong>
            <ol>
            @forelse($student->clubs as $club)
                <li>{{ $club->name }}</li>
            @empty
            <p>{{ $student->full_name }} has notyet been assigned to any club.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
