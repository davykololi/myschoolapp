@extends('layouts.admin')
@section('title', '| Show Student')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>STUDENT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.students.index') }}" class="btn btn-primary pull-right"> Back</a>
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
            {{ $student->title }} {{ $student->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $student->position_student->name }}, {{ $student->school->name }}
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
            <strong>Phone No.:</strong>
            {{ $student->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $student->getDob() }}
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
            {{ $student->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOA:</strong>
            {{ $student->getDoa() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $student->intake->name }}
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
            <strong>{{ $student->last_name }}'s Subjects:</strong>
            <ol>
            @forelse($student->subjects as $subject)
                <li>{{ $subject->name }}</li>
            @empty
            <p>No subject(s) assigned to {{ $student->full_name }} yet.</p>
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
            <p>{{ $student->full_name }} notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Assignments:</strong>
            <ol>
            @forelse($student->assignments as $assignment)
                <li>
                    {{ $assignment->name }} {{ $assignment->file}} <span style="color: blue">Given:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->date_given)) }} <span style="color: red">Deadline:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->deadline)) }}.
                </li>
            @empty
            <p>{{ $student->full_name }} notyet been given any assignment(s).</p>
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
            <p>{{ $student->full_name }} notyet been assigned to any club.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->last_name }}'s Meetings:</strong>
            <ol>
            @forelse($student->meetings as $key => $meeting)
                <li>
                    {{ $meeting->name }} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }}.
                    <span style="color: green"> Agenda:</span> {{ $meeting->agenda }}.
                </li>
            @empty
            <p>{{ $student->full_name }} notyet been assigned to any meeting(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>More:</strong>
            {!! $student->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($student->created_at)) }}</span>
        </div>
    </div>
    @include('student.attachsubjectform')
    @include('student.detachsubjectform')
    @include('student.attachrewardform')
    @include('student.detachrewardform')
    @include('student.attachassignmentform')
    @include('student.detachassignmentform')
    @include('student.attachmeetingform')
    @include('student.detachmeetingform')
</div>
</main>
@endsection
