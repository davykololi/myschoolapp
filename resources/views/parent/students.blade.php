@extends('layouts.parent')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{ $user->full_name}} Students</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($students as $student)
                            <li>
                                <a href="{{route('parent.show.student',$student->id)}}">{{ $student->full_name}}</a>
                                 -
                                <a href="{{route('parent.student.stream',$student->stream->id)}}">
                                    {{ $student->stream->name }}
                                </a> 
                                 <a href="{{route('parent.show.student',$student->id)}}">
                                     <img style="margin-left: 2em" width="30" height="30" src="/storage/storage/{{ $student->image }}">
                                 </a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
