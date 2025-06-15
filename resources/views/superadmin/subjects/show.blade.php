@extends('layouts.superadmin')
@section('title', '| Subject Details')

@section('content')
@role('superadmin')
<div class="max-w-screen">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>SUBJECT DETAILS</h2>
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
            <strong>Subject Name:</strong>
            {{ $subject->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            {{ $subject->type }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subject Code:</strong>
            {{ $subject->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Department:</strong>
            {{ $subject->department->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($subject->created_at)) }}</span>
        </div>
    </div>
</div>
</div>
@endrole
@endsection
