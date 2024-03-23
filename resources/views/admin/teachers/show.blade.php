@extends('layouts.superadmin')
@section('title', '| Admin Teacher Details')

@section('content')
@role('admin')
@can('dataOfficer')
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
            {{ $teacher->salutation }} {{ $teacher->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            @if(!empty($teacher->role->name))
            <span>{{ $teacher->role->name }}</span>
            @else
            <span>{{ __('Has No Role') }}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $teacher->email }}
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
            <strong>Postal Address:</strong>
            {{ $teacher->address }}
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
            <strong>{{ $teacher->salutation }} {{ $teacher->first_name }}'s Classes:</strong>
            <ol>
            @forelse($teacher->streams as $stream)
            <a href="{{route('superadmin.streams.show',$stream->id)}}">
                <li>
                    {{ $stream->name }} -
                    @if(!empty($teacher->stream_subjects))
                    @forelse($teacher->stream_subjects as $strmSubject)
                        <span class="text-green-800">{{ $strmSubject->subject->name }}</span>
                    @empty
                        {{ __('Not yet assigned to stream')}}
                    @endforelse
                    @endif
                </li>
            </a>
            @empty
            <p style="color: red">{{ $teacher->salutation }} {{ $teacher->first_name }} notyet assigned to any class.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->salutation }} {{ $teacher->first_name }}'s Subjects:</strong>
            <ol>
            @forelse($teacher->subjects as $subject)
                <li>{{ $subject->name }}</li>
            @empty
            <p style="color: red">No subject(s) assigned to {{ $teacher->title }} {{ $teacher->first_name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->salutation }} {{ $teacher->first_name }}'s Assignments:</strong>
            <ol>
            @forelse($teacher->assignments as $assignment)
                <li>
                    {{ $assignment->name }} Published: {{ date("jS,F,Y,g:i a",strtotime($assignment->date)) }} 
                    Deadline: {{ date("jS,F,Y",strtotime($assignment->deadline)) }} {{ $assignment->file }}
                    @foreach($assignment->streams as $stream)
                        {{$stream->name}}.
                    @endforeach
                </li>
            @empty
            <p style="color: red">No assignment(s) by {{ $teacher->title }} {{ $teacher->first_name }}.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('teacher.attachstreamform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('teacher.attachsubjectform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('teacher.attachassignmentform')
    </div>
</div>

<div class="row">
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        @include('teacher.attachrewardform')
    </div>
</div>
</x-backend-main>
@endcan
@endrole
@endsection
