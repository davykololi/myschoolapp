@extends('layouts.admin')
@section('title', '| Show Award')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>AWARD DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.rewards.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $reward->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Purpose:</strong>
            {{ $reward->purpose }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $reward->date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School:</strong>
            {{ $reward->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Awarded To:</strong>
            @foreach($reward->streams as $stream)
                {{ $stream->name }},
            @endforeach
            @foreach($reward->students as $student)
                {{ $student->full_name }},
            @endforeach
            @foreach($reward->teachers as $teacher)
                {{ $teacher->full_name }},
            @endforeach
            @foreach($reward->staffs as $staff)
                {{ $staff->full_name }},
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($reward->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
