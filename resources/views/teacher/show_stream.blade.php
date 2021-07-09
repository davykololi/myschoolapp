@extends('layouts.teacher')
@section('title', '| Show Stream')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{$stream->name}} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('teacher.streams') }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label style="text-transform: uppercase;">{{$stream->name}} Students</label>
        <ol>
        @forelse($stream->students as $student)
            <li>
                <a href="{{ route('teacher.student', $student->id) }}">{{ $student->full_name }}</a> 
            </li>
        @empty
            <p style="color: red">Student(s) notyet assigned to {{$stream->name}}.</p>
        @endforelse
        </ol>
        </div>
        <div class="form-group">
            <label style="text-transform: uppercase;">{{ $stream->name }} Teachers</label>
            <ol>
            @forelse($stream->teachers as $teacher)
            <li>
                <a href="{{ route('teacher.show', $teacher->id) }}">
                    {{ $teacher->full_name }}
                </a> 
            </li>
        @empty
            <p style="color: red">Teacher(s) notyet assigned to {{$stream->name}}.</p>
        @endforelse
        </ol>
        </div>


        <div class="form-group">
            <label style="text-transform: uppercase;">{{$stream->name}} Timetable</label>
            @if(!empty($stream->timetable))
                <a href="{{route('teacher.timetable.download',$stream->timetable->id)}}" class="btn btn-outline-warning">Download</a>
            @else
            <p style="color: red">{{$stream->name}} Timetable Notyet Uploaded.</p>
            @endif
        </div>
    </div>
</div>
</main>
@endsection
