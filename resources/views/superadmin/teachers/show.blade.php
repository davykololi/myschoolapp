@extends('layouts.superadmin')
@section('title', '| Teacher Details')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
        @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>TEACHER DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%;border: solid brown 5px;padding: 2px" src="/storage/storage/{{ $teacher->image }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $teacher->full_name }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $teacher->user->salutation }} {{ $teacher->user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            @if(!empty($teacher->position->name))
            <span>{{ $teacher->position->value }}</span>
            @else
            <span>{{ __('Has No Position') }}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $teacher->user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID No.:</strong>
            {{ $teacher->id_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Emp. No.:</strong>
            {{ $teacher->emp_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $teacher->getDob() }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $teacher->age }} years.
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation:</strong>
            {{ $teacher->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Current Postal Address:</strong>
            {{ $teacher->current_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permanent Postal Address:</strong>
            {{ $teacher->permanent_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $teacher->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $teacher->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($teacher->created_at)) }}</span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->user->salutation }} {{ $teacher->user->first_name }}'s Classes:</strong>
            <ol>
            @forelse($teacherStreams as $stream)
            <a href="{{route('superadmin.streams.show',$stream->id)}}">
                <li>
                    {{ $stream->name }} -
                    @if(!empty($teacherStreamSubjects))
                    @forelse($teacherStreamSubjects as $strmSubject)
                        <span class="text-green-800">{{ $strmSubject->subject->name }}</span>
                    @empty
                        {{ __('Not yet assigned to stream')}}
                    @endforelse
                    @endif
                </li>
            </a>
            @empty
            <p style="color: red">{{ $teacher->user->salutation }} {{ $teacher->user->first_name }} notyet assigned to any class.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->user->salutation }} {{ $teacher->user->first_name }}'s Subjects:</strong>
            <ol>
            @forelse($teacherSubjects as $subject)
                <li>{{ $subject->name }}</li>
            @empty
            <p style="color: red">No subject(s) assigned to {{ $teacher->title }} {{ $teacher->first_name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->user->salutation }} {{ $teacher->user->first_name }}'s Assignments:</strong>
            <ol>
            @forelse($teacherAssignments as $assignment)
                <li>
                    {{ $assignment->name }} Published: {{ date("jS,F,Y,g:i a",strtotime($assignment->date)) }} 
                    Deadline: {{ date("jS,F,Y",strtotime($assignment->deadline)) }} {{ $assignment->file }}
                    @foreach($assignment->streams as $stream)
                        {{$stream->name}}.
                    @endforeach
                </li>
            @empty
            <p style="color: red">No assignment(s) by {{ $teacher->user->salutation }} {{ $teacher->user->first_name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('superadmin.teacher.attach_detach_streamform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('superadmin.teacher.attach_detach_subjectform')
    </div>
</div>
</x-backend-main>
@endsection
