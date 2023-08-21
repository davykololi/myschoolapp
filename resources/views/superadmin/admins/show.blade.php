@extends('layouts.superadmin')
@section('title', '| Show Admin')

@section('content')
<x-backend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ADMIN DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('superadmin.admins.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ $admin->image }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $admin->full_name }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $admin->salutation }} {{ $admin->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{ $admin->role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $admin->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>History:</strong>
            {!! $admin->history !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($admin->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
