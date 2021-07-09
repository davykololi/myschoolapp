@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{ $user->stream->name}} Exam Schedule</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($streamExams as $exam)
                            <li>
                                {{ $exam->name}} 
                                <span style="color: blue">Start Date:</span> {{ date("jS,F,Y",strtotime($exam->start_date)) }}
                                <span style="color: blue">End Date:</span> {{ date("jS,F,Y",strtotime($exam->end_date)) }}.
                                <span style="color: green;">Timetable:</span> 
                                @if(!empty($exam->timetables))
                                    @forelse($exam->exam_timetables as $examTimetable)
                                        <a href="{{route('student.timetable.download',$timetable->id)}}" class="btn btn-outline-warning">
                                            Download
                                        </a>
                                    @empty
                                        <span style="color: red">The Timetable Notyet Uploaded.</span>
                                    @endforelse
                                @endif
                            </li>
                            @empty
                                <p style="color: red">{{$user->stream->name}} Has No Exam Schedule.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
