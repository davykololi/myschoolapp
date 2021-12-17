@extends('layouts.parent')

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
            <a href="{{ route('parent.students') }}" class="label label-primary pull-right"> Back</a>
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
            {{ $student->title }} {{ $student->full_name }}
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
            {{ $student->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $student->intake->name }} {{ date('d-m-Y',strtotime($student->intake->date)) }}
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
            <strong>Student Progress:</strong>
            @if(!empty($student->progress))
            @forelse($student->progress as $key => $p)
            {!! $p->content !!}
            @empty
            <p>No ducumentation about the student's progress done yet.</p>
            @endforelse
            @endif
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
            <p>{{ $student->full_name }} has notyet recieved any award.</p>
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
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->date)) }} <span style="color: red">Deadline:</span> 
                    {{ date("jS,F,Y,g:i a",strtotime($assignment->deadline)) }}.
                </li>
            @empty
            <p>{{ $student->full_name }} has notyet been given any assignment(s).</p>
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
            <p>{{ $student->full_name }} has notyet been assigned to any meeting(s).</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
