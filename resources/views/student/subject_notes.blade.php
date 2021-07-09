@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">
                            {{ $user->stream->name}} {{$standardSubject->subject->name}} Notes
                        </h1>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('student.stream.subjects') }}" class="label label-primary pull-right"> Back</a>
                    </div>
                    <div class="panel-body">
                        @if(!empty($standardSubject))
                        <ol>
                            @forelse($standardSubject->notes as $note)
                            <li>
                                <span style="color: blue">{{$note->desc}}</span> - By
                                <a href="{{route('student.teacher.details',[$note->teacher->id,Auth::user()->stream->id])}}">
                                    {{$note->teacher->title}} {{$note->teacher->full_name}} <span style="color: green">{{$note->teacher->phone_no}}</span>
                                </a>
                                <a href="{{route('student.notes.download',$note->id)}}" class="btn btn-outline-warning">Download</a>
                            </li>
                            @empty
                                <p style="color: red">
                                    {{ $user->stream->name}} {{$standardSubject->subject->name}} Notes Notyet Uploaded.
                                </p>
                            @endforelse
                        </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
