@extends('layouts.parent')
@section('title', '| Parent Profile')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">My Profile</h2>
            <br/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width:15%" src="/storage/storage/{{ Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'" class="border-4 border-yellow-800 p-4" alt="{{ Auth::user()->full_name }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{$parent->name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $parent->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>My Children at {{ $parent->school->name }}</strong>
            <ol>
                @foreach($parentStudents as $student)
                <li>
                    {{$student->full_name}} <span style="color: green">Class</span> {{$student->stream->name}}
                </li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($parent->created_at)) }}
            </span>
        </div>
    </div>
</div>
</main>
@endsection
