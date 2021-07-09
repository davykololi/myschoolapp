@extends('layouts.admin')
@section('title', '| Show An Assignment')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ASSIGNMENT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.assignments.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $assignment->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Given To:</strong>
            @forelse($assignment->streams as $stream)
                {{$stream->name}},
            @empty
             <p>No assignment(s) yet.</p>
            @endforelse
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Given:</strong>
            {{ \Carbon\Carbon::parse($assignment->date)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deadline:</strong>
            {{ \Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Given By:</strong>
            @foreach($assignment->teachers as $teacher)
                {{ $teacher->full_name }}
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School:</strong>
            {{ $assignment->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>File:</strong>
            <a href="{{route('admin.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                Download
            </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($assignment->created_at)) }}
            </span>
        </div>
    </div>
    @include('assignment.attachstudentform')
    @include('assignment.detachstudentform')
</div>
</main>
@endsection
