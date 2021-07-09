@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{$user->stream->name}} Teachers</h1>
                    </div>
                    <div class="panel-body">
                        <span style="color: green;text-transform: uppercase;"><b>{{$user->stream->name}} Timetable:</b></span> 
                        @if(!empty($streamTimetable))
                            <a href="{{route('student.timetable.download',$streamTimetable->id)}}" class="btn btn-outline-warning">Download</a>
                        @else
                            <span style="color: red">{{$user->stream->name}} Timetable Notyet Uploaded.</span>
                        @endif
                    </div>
                    <div class="panel-body">
                        <br/>
                        <span style="color: green;text-transform: uppercase;"><b>{{$user->stream->name}} Teachers:</b></span>
                        <ol>
                            @forelse($user->stream->teachers as $teacher)
                            <li>
                                <a href="{{route('student.teacher.details',[$teacher->id,Auth::user()->stream->id])}}">
                                    {{$teacher->title}} {{$teacher->full_name}} <span style="color: orange">{{$teacher->phone_no}}</span>
                                    {{$teacher->email}}
                                </a>
                            </li>
                            @empty
                                <p style="color: red">No Teacher(s) Assigned To {{$user->stream->name}}.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
