@extends('layouts.superadmin')
@section('title', '| Show School')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>SCHOOL DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('superadmin.schools.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Category:</strong>
            {{ $school->type }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Name:</strong>
            {{ $school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Initials:</strong>
            {{ $school->initials }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $school->image }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Code:</strong>
            {{ $school->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Head:</strong>
            {{ $school->head }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Ass Head:</strong>
            {{ $school->ass_head }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Motto:</strong>
            {{ $school->motto }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Vision:</strong>
            {{ $school->vision }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School Mission:</strong>
            {{ $school->mission }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email Address:</strong>
            {{ $school->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Postal Address:</strong>
            {{ $school->postal_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Core Values:</strong>
            {!! $school->core_values !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span><strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($school->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
