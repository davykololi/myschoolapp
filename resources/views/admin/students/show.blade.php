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
            <a href="{{ url()->previous() }}" class="btn btn-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $student->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $student->title }} {{ $student->name }}
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
            <span style="color: green">Name:</span> {{ $student->parent->title }} {{ $student->parent->name }} 
            <span style="color: green">Phone:</span> {{ $student->parent->phone_no }}
            <span style="color: green">Job:</span> {{ $student->parent->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->name }}'s Subjects:</strong>
            <ol>
            @forelse($student->subjects as $subject)
            <a href="{{route('admin.subjects.show',$subject->id)}}">
                <li>{{ $subject->name }}</li>
            </a>
            @empty
            <p>No subject(s) assigned to {{ $student->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->name }}'s Awards:</strong>
            <ol>
            @forelse($student->rewards as $reward)
            <a href="{{route('admin.rewards.show',$reward->id)}}">
                <li>{{ $reward->name }} <span style="color: blue">Purpose:</span> {{ $reward->purpose }}.</li>
            </a>
            @empty
                <p>{{ $student->name }} notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->name }}'s Assignments:</strong>
            <ol>
            @forelse($student->assignments as $assignment)
                <li>
                    {{ $assignment->name }} {{ $assignment->file}} <span style="color: blue">Given:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->date_given)) }} <span style="color: red">Deadline:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->deadline)) }}.
                </li>
            @empty
                <p>{{ $student->name }} notyet been given any assignment(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->name }}'s Clubs:</strong>
            <ol>
            @forelse($student->clubs as $club)
            <a href="{{route('admin.clubs.show',$club->id)}}">
                <li>{{ $club->name }}</li>
            </a>
            @empty
                <p>{{ $student->name }} notyet been assigned to any club.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $student->name }}'s Meetings:</strong>
            <ol>
            @forelse($student->meetings as $key => $meeting)
            <a href="{{route('admin.meetings.show',$meeting->id)}}">
                <li>
                    {{$meeting->name}} to be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda will be 
                     {{ $meeting->agenda }}.
                </li>
            </a>
            @empty
                <p>{{ $student->name }} notyet been assigned to any meeting(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>More About {{ $student->name }}:</strong>
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
