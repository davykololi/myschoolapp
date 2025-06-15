@extends('layouts.admin')
@section('title', '| Award Details')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>AWARD DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.awards.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $award->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Purpose:</strong>
            {{ $award->purpose }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date:</strong>
            {{ $award->date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>School:</strong>
            {{ $award->school->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Awarded To:</strong>
            @foreach($award->streams as $stream)
                {{ $stream->name }},
            @endforeach
            @foreach($award->students as $student)
                {{ $student->full_name }},
            @endforeach
            @foreach($award->teachers as $teacher)
                {{ $teacher->full_name }},
            @endforeach
            @foreach($award->staffs as $staff)
                {{ $staff->full_name }},
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($award->created_at)) }}</span>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
