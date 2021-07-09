@extends('layouts.admin')
@section('title', '| Show Stream')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $stream->name }} Details</h2>
            <br/>
            <a href="{{route('admin.stream.students',$stream->id)}}" class="btn btn-primary btn-border">
                {{ $stream->name }} Students Pdf
            </a>
            <a href="{{route('admin.stream.teachers',$stream->id)}}" class="btn btn-primary btn-border">
                {{ $stream->name }} Teachers Pdf
            </a>
            <a href="{{route('admin.export.stream_students',$stream->id)}}" class="btn btn-primary btn-border">
                {{ $stream->name }} Students Excel
            </a>
            <a href="{{route('admin.export.stream_teachers',$stream->id)}}" class="btn btn-primary btn-border">
                {{ $stream->name }} Teachers Excel
            </a>
            <br/><br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.streams.index') }}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream:</strong>
            {{ $stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Class:</strong>
            {{ $stream->class->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream Code:</strong>
            {{ $stream->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream:</strong>
            {{ $stream->stream_section->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Students:</strong>
            <ol>
            @forelse($stream->students as $student)
                <li>{{ $student->full_name }} {{ $student->phone_no }}</li>
            @empty
            <p style="color: red">No students(s) assigned to {{ $stream->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Teachers:</strong>
            <ol>
            @forelse($stream->teachers as $teacher)
                <li>
                    <a href="{{route('admin.stream.teacher',[$teacher->id,$stream->id])}}">
                        {{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }}
                    </a>
                </li>
            @empty
            <p style="color: red">No teacher(s) assigned to {{ $stream->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Assignments:</strong>
            <ol>
            @forelse($stream->assignments as $assignment)
                <li>
                    {{ $assignment->name }} Given: {{ date("jS,F,Y,g:i a",strtotime($assignment->date)) }} 
                    Deadline: {{ date("jS,F,Y",strtotime($assignment->deadline)) }} 
                    <a href="{{route('admin.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                        Download
                    </a>
                    @foreach($assignment->teachers as $teacher)
                       <span style="color: blue">By:</span> {{$teacher->title}} {{$teacher->full_name}} {{$teacher->phone_no}}.
                    @endforeach
                </li>
            @empty
            <p style="color: red">No assignment(s) to {{ $stream->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Exams:</strong>
            <ol>
            @forelse($stream->exams as $exam)
                <li>
                    {{ $exam->name }} 
                    Start Date:{{ date("jS,F,Y",strtotime($exam->start_date)) }} End Date:{{ date("jS,F,Y",strtotime($exam->end_date)) }} 
                    {{ $exam->file }}
                    <span style="color: blue">Timetable:</span>
                    @forelse($exam->timetables as $timetable)
                        {{$timetable->file}}
                    @empty
                        <span style="color: red">The Timetable Notyet Uploaded.</span>
                    @endforelse
                </li>
            @empty
            <p style="color: red">No exam(s) to {{ $stream->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Meetings:</strong>
            <ol>
            @forelse($stream->meetings as $meeting)
                <li>{{ $meeting->name }} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }} at {{ $meeting->venue }}. Agenda: {{ $meeting->agenda }}</li>
            @empty
            <p style="color: red">No meeting(s) assigned to {{ $stream->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Awards:</strong>
            <ol>
            @forelse($stream->rewards as $reward)
                <li>{{ $reward->name }}. Purpose: {{ $reward->purpose }}.</li>
            @empty
            <p style="color: red">{{ $stream->name }} has notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Subjects:</strong>
            <ol>
            @forelse($stream->subjects as $subject)
                <li>{{ $subject->name }}.</li>
            @empty
            <p style="color: red">The subject(s) have notyet been assigned to {{ $stream->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($stream->created_at)) }}
            </span>
        </div>
    </div>
    @include('stream.attachteacherform')
    @include('stream.detachteacherform')
    @include('stream.attachassignmentform')
    @include('stream.detachassignmentform')
    @include('stream.attachexamform')
    @include('stream.detachexamform')
    @include('stream.attachmeetingform')
    @include('stream.detachmeetingform')
    @include('stream.attachrewardform')
    @include('stream.detachrewardform')
    @include('stream.attachsubjectform')
    @include('stream.detachsubjectform')
</div>
</main>
@endsection
