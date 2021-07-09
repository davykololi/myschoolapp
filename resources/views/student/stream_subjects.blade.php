@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{ $user->stream->name}} Facilitators</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                        @if(!empty($standardSubjects))
                            @forelse($standardSubjects as $standardSubject)
                            <li>
                                <span style="color: orange">
                                    <a href="{{route('student.teacher.details',[$standardSubject->teacher->id,Auth::user()->stream->id])}}">
                                        {{$standardSubject->teacher->full_name}} {{$standardSubject->teacher->phone_no}}
                                    </a>
                                </span> - 
                                    <a href="{{route('student.subject.notes',$standardSubject->id)}}">
                                        {{$standardSubject->subject->name}}
                                    </a>
                            </li>
                            @empty
                                <p style="color: red"> The Facilitators Notyet Assigned to {{ $user->stream->name }} Subjects.</p>
                            @endforelse
                        </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
