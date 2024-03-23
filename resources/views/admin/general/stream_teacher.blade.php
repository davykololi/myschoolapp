@extends('layouts.admin')
@section('title', '| Stream Teacher')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
    <div class="row">
        @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">
                {{$stream->name}} Teacher Details
            </h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.streams.show', $stream->id) }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $teacher->image }}" onerror="this.src='{{asset('static/avatar.png')}}'">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $teacher->title }} {{ $teacher->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $teacher->position_teacher->name }}, {{ $teacher->school->name }}
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
            {{ date("jS,F,Y",strtotime($teacher->dob)) }}
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
            <strong>{{ $teacher->title }} {{ $teacher->name }}'s Classes:</strong>
            <ol>
            @forelse($teacher->streams as $stream)
                <li>{{ $stream->name }}</li>
            @empty
            <p style="color: red">{{ $teacher->title }} {{ $teacher->name }} notyet assigned to any class.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->title }} {{ $teacher->name }}'s Subjects:</strong>
            <ol>
            @forelse($teacher->stream_subject_teachers as $strmSubTech)
                <li>{{ $strmSubTech->subject->name }} {{ $strmSubTech->stream->name }} {{ $strmSubTech->subject->code }}</li>
            @empty
            <p style="color: red">No subject(s) assigned to {{ $teacher->title }} {{ $teacher->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->title }} {{ $teacher->name }}'s Assignments:</strong>
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
            <p style="color: red">No assignment(s) by {{ $teacher->title }} {{ $teacher->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $teacher->title }} {{ $teacher->name }}'s Awards:</strong>
            <ol>
            @forelse($teacher->rewards as $reward)
                <li>{{ $reward->name }} Purpose: {{ $reward->purpose }}</li>
            @empty
            <p style="color: red">{{ $teacher->title }} {{ $teacher->name }} has notyet recieved any award.</p>
            @endforelse
            </ol>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
