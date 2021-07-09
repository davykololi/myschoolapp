@extends('layouts.teacher')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="text-transform: uppercase;">{{$user->school->name}} Streams</h3></div>
                    <div class="panel-body">
                        <ol>
                            @foreach($streams as $stream)
                            <li>
                                <span style="text-transform: uppercase;">
                                    <a href="{{ route('teacher.stream.show', $stream->id) }}">{{$stream->class->name}} {{$stream->name}}</a>
                                </span>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
