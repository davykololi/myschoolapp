@extends('layouts.superadmin')
@section('title', '| Show Librarian')

@section('content')
<x-backend-main>
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>LIBRARIAN DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ \URL::previous() }}" class="label label-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $librarian->image }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $librarian->title }} {{ $librarian->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{ $librarian->role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $librarian->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Postal Address</strong>
            {{ $librarian->address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Designation</strong>
            {{ $librarian->designation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>DOB:</strong>
            {{ date("jS,F,Y",strtotime($librarian->dob)) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Age:</strong>
            {{ $librarian->age }} years
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $librarian->email }} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Emp. No.</strong>
            {{ $librarian->emp_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History</strong>
            {!! $librarian->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($librarian->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
