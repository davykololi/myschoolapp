@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{ $user->stream->name}} Students</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @foreach($user->stream->students as $student)
                            <li>
                                {{ $student->full_name}}
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
