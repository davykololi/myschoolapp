@extends('layouts.parent')

@section('content')
@role('parent')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $stream->name }} Details</h2>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Teachers:</strong>
            <ol>
            @forelse($streamSubjects as $streamSubject)
                <li>
                    <a href="{{route('admin.stream.teacher',[$streamSubject->teacher->id,$stream->id])}}">
                        {{ $streamSubject->teacher->user->salutation }} {{ $streamSubject->teacher->user->full_name }} {{ $streamSubject->teacher->phone_no }} Facilitates {{ $streamSubject->subject->name }}
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
                    {{ $assignment->name }} Given: {{ $assignment->date_given }} 
                    Deadline: {{ $assignment->deadline }} 
                    <a href="{{route('admin.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                        Download
                    </a>
                    @foreach($assignment->teachers as $teacher)
                        <span style="color: blue">By:</span> 
                        <a href="{{route('parent.show.teacher',$teacher->id)}}">
                            {{$teacher->user->salutation}} {{$teacher->user->full_name}} {{$teacher->phone_no}}.
                        </a>
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
                    Start Date:{{ $exam->start_date }} End Date:{{ $exam->end_date }} 
                    {{ $exam->file }}
                    <span style="color: blue">Timetable:</span>
                    @if(!is_null($exam->exam_timetables))
                    @forelse($exam->exam_timetables as $timetable)
                        {{$timetable->file}}
                    @empty
                        <span style="color: red">The Timetable Notyet Uploaded.</span>
                    @endforelse
                    @endif
                </li>
            @empty
            <p style="color: red">No exam(s) to {{ $stream->name }} yet.</p>
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
            <p style="color: red">No subjects assigned to {{ $stream->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
