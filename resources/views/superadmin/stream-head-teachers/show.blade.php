@extends('layouts.superadmin')
@section('title', '| Stream Head Teacher Details')

@section('content')
@role('superadmin')
<div class="max-w-screen">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>STREAM HEAD TEACHER DETAILS</h2>
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
            <strong>Teacher's Name:</strong>
            {{ $streamHeadTeacher->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name Initials:</strong>
            {{ $streamHeadTeacher->name_initials }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $streamHeadTeacher->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stream:</strong>
            {{ $streamHeadTeacher->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($streamHeadTeacher->created_at)) }}</span>
        </div>
    </div>
</div>
</div>
@endrole
@endsection
