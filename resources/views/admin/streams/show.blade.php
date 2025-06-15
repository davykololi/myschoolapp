@extends('layouts.admin')
@section('title', '| Admin Stream Details')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
    <div class="row">
    @include('partials.messages')
    @include('partials.errors')
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
            <div>
                <p>{{ $stream->name }} has {{ $streamStudents}} students. {{ $females }} female and {{ $males }} male</p>
            </div>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream Name:</strong>
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
            <strong>{{ $stream->name }} Students:</strong>
            <ol>
            @forelse($streamSubjects as $student)
            <a href="{{ route('admin.students.show', $student->id) }}">
                <li>{{ $student->full_name }} {{ $student->phone_no }}</li>
            </a>
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
            @forelse($streamTeachers as $teacher)
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
            @forelse($streamAssignments as $assignment)
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
            @forelse($streamExams as $exam)
                <li>
                    {{ $exam->name }} 
                    Start Date:{{ date("jS,F,Y",strtotime($exam->start_date)) }} End Date:{{ date("jS,F,Y",strtotime($exam->end_date)) }} 
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
            @forelse($streamMeetings as $meeting)
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
            @forelse($streamAwards as $award)
                <li>{{ $award->name }}. Purpose: {{ $award->purpose }}.</li>
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
            @forelse($streamSubjects as $subject)
                <li>{{ $subject->name }}.</li>
            @empty
            <p style="color: red">The subject(s) have notyet been assigned to {{ $stream->name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $stream->name }} Subject Teachers:</strong>
            <div>
            <table style="width: 100%;">
                <thead>
                    <th>
                        <td><b>NO</b></td>
                        <td><b>SUBJECT</b></td>
                        <td><b>TECHER</b></td>
                        <td><b>EMAIL</b></td>
                        <td><b>Action</b></td>
                    </th>
                </thead>
                <tbody>
                    @forelse($stream->stream_subjects as $strmSubTeacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <tb><b>{{ $strmSubTeacher->subject->name }}</b></tb>
                        <tb>{{ $strmSubTeacher->teacher->user->full_name }}</tb>
                        <tb><i>{{ $strmSubTeacher->teacher->user->email }}</i>.</tb>
                        <td>
                            <form action="{{route('admin.streamteacher.remove',$strmSubTeacher->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    @empty
                        <tb style="color: red">The subjects facilitators have notyet been assigned to {{ $stream->name }}.</tb>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($stream->created_at)) }}
            </span>
        </div>
    </div>
</div>
<br/>

<div class=w-full>
<div class="flex flex-col md:flex-row lg:flex-row gap-4 border border-4 rounded-md px-2 md:px-8 lg:px-8 mb-4">
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.attach_assignment_to_stream')
    </div>
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.detach_assignment_from_stream')
    </div>
</div>

<div class="flex flex-col md:flex-row lg:flex-row gap-4 border border-4 rounded-md px-2 md:px-8 lg:px-8 mb-4">
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.attach_exam_to_stream')
    </div>
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.detach_exam_from_stream')
    </div>
</div>

<div class="flex flex-col md:flex-row lg:flex-row gap-4 border border-4 rounded-md px-2 md:px-8 lg:px-8 mb-4">
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.attach_meeting_to_stream')
    </div>
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.detach_meeting_from_stream')
    </div>
</div>

<div class="flex flex-col md:flex-row lg:flex-row gap-4 border border-4 rounded-md px-2 md:px-8 lg:px-8 mb-4">
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.attach_award_to_stream')
    </div>
    <div  class="w-full md:w-1/2 lg:w-1/2 my-4">
        @include('admin.stream.detach_award_from_stream')
    </div>
</div>
</div>
</x-backend-main>
@endrole
@endsection
