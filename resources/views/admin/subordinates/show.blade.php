@extends('layouts.admin')
@section('title', '| Admin Subordinate Staff Details')

@section('content')
@role('admin')
<x-backend-main>
<div role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{$subordinate->user->salutation}} {{$subordinate->user->first_name}}'s Details</h2>
            <br/>
        </div>
        <div>
            @include('partials.messages')
            @include('partials.errors')
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $subordinate->image }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $subordinate->user->salutation }} {{ $subordinate->user->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Position:</strong>
            {{ $subordinate->position->value }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $subordinate->user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employment No.:</strong>
            {{ $subordinate->emp_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID No.:</strong>
            {{ $subordinate->id_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ $subordinate->dob }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
             {{ $subordinate->age }} years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation:</strong>
            {{ $subordinate->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Current Postal Address:</strong>
            {{ $subordinate->current_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permanent Postal Address:</strong>
            {{ $subordinate->permanent_address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $subordinate->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($subordinate->created_at)) }}</span>
        </div>
    </div>
    <div class="flex flex-col md:flex-row lg:flex-row mb-4 gap-8">
        <div class="w-full md:w-1/2 lg:w-1/2">
            @include('admin.subordinate.attach_assignment_form')
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2">
            @include('admin.subordinate.detach_assignment_form')
        </div>
    </div>
</div>
</div>
</x-backend-main>
@endrole
@endsection
