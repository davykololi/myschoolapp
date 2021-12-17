@extends('layouts.student')
@section('title', '| Student Profile')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">Student Profile</h2>
            <br/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{$user->full_name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{$user->position_student->name}}, {{ $user->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adm. No:</strong>
            {{ $user->admission_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $user->getDob() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $user->age }} years.
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Postal Address:</strong>
            {{ $user->postal_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Class:</strong>
            {{ $user->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intake:</strong>
            {{ $user->intake->name }} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOA:</strong>
            {{ $user->getDoa() }} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory:</strong>
            {{ $user->dormitory->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>More:</strong>
            {!! $user->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subjects:</strong>
            <ol>
                @forelse($user->subjects as $subject)
                <li>
                    {{$subject->name}}
                </li>
                @empty
                    <span style="color: red">Subject(s) notyet assigned to you.</span>
                @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Individual Assignments:</strong>
            <ol>
            @forelse($user->assignments as $assignment)
            <li>
                {{$assignment->name}} 
                <a href="{{route('assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                    Download
                </a> 
                <i style="color: blue">Published:</i> 
                {{ \Carbon\Carbon::parse($assignment->date)->format('d-m-Y') }} 
                <i style="color: red">Deadline</i> {{ \Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y') }} 
                @foreach($assignment->teachers as $teacher)
                    By: {{$teacher->title}} {{$teacher->full_name}} {{$teacher->phone_no}}
                @endforeach
            </li>
            @empty
                <span style="color: red">You don't have any assignment yet.</span>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Awards:</strong>
            <ol>
            @forelse($user->rewards as $reward)
                <li>
                    {{$reward->name}}. Purpose: {{$reward->purpose}}.
                </li>
            @empty
                <span style="color: red">You have notyet recieved any award. Work hard for one!!</span>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Meetings:</strong>
            <ol>
            @forelse($user->meetings as $meeting)
            	<li>
                	{{$meeting->name}} to be held on {{ date("jS,F,Y",strtotime($meeting->date)) }}. 
                    <span style="color: green">Agenda:</span> {{$meeting->agenda}}.
                </li>
            @empty
            	<span style="color: red">You have  not been assigned to any meeting(s).</span>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clubs:</strong>
            <ol>
            @forelse($user->clubs as $club)
                <li>
                    <a href="{{ route('student.club', $club->id) }}">{{$club->name}}</a>
                </li>
            @empty
                <span style="color: red">You have  not been assigned to any club(s).</span>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</main>
@endsection
