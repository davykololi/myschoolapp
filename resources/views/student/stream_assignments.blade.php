@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{ Auth::user()->stream->name}} Assignments</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($user->stream->assignments as $assignment)
                            <li>
                                {{ $assignment->name}}
                                <a href="{{route('student.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                                    Download
                                </a>
                                 <span style="color: blue">Given:</span> {{ $assignment->getDate() }}
                                <span style="color: red">Deadline:</span> {{ $assignment->getDeadline() }}
                                @foreach($assignment->teachers as $teacher)
                                    <span style="color: orange">By:</span>
                                        <span style="margin: 2px;">
                                            <a href="{{route('student.teacher.details',[$teacher->id,Auth::user()->stream->id])}}">
                                                {{$teacher->title}} {{$teacher->full_name}}
                                            </a> 
                                        </span>
                                        <span style="color: magenta">{{$teacher->phone_no}}</span>
                                        <span style="color: purple">{{$teacher->email}}</span>
                                        <span id="demo"></span>
                                @endforeach
                            </li>
                            @empty
                            <p style="color: red">No assignment(s) to {{ $user->stream->name}}.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('student.assignment_script')
