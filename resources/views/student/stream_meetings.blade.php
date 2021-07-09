@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">{{$user->stream->name}} Meetings</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($user->stream->meetings as $meeting)
                            <li>
                                {{ $meeting->name }} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }} at {{ $meeting->venue }}. <span style="color: green">Agenda:</span> {{ $meeting->agenda }} 
                            @empty
                            <p style="color: red">No meeting(s) assigned to {{$user->stream->name}}.</p>
                            </li>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
