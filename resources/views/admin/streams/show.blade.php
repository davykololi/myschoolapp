@extends('layouts.admin')
@section('title', '| Admin Stream Details')

@section('content')
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
            @forelse($stream->students as $student)
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
                    @forelse($stream->stream_subject_teachers as $strmSubTeacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <tb><b>{{ $strmSubTeacher->subject->name }}</b></tb>
                        <tb>{{ $strmSubTeacher->teacher->full_name }}</tb>
                        <tb><i>{{ $strmSubTeacher->teacher->email }}</i>.</tb>
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
<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachteacherform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachassignmentform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachexamform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachmeetingform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachrewardform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('stream.attachsubjectform')
    </div>
</div>

<br/><br/>

    <h2 class="text-title" style="text-align: left;"><b>ATTACH SUBJECT TO TEACHER</b></h2>
    <form id="subject_teacher_form" action="{{ route('admin.streamsubjectteacher.store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" name="stream_id" id="stream_id" class="form-control" value="{{ $stream->id }}">
            </div>
        </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        @include('ext._attach_stream_subjects')
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Attach Teacher: <span class="text-danger">*</span></label>
                        <select id="teacher_id" type="teacher_id" value="{{old('teacher_id')}}" class="form-control" name="teacher_id">
                            <option value="">Select Teacher</option>
                            @foreach ($streamTeachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('teacher_id'))
                            <span class="help-block">
                                <span class="text-danger">{{$errors->first('teacher_id')}}</span>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Attach</button>
            </div>
        </div>
    </form>
</x-backend-main>
@endsection
