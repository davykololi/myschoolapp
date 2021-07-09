@extends('layouts.admin')
@section('title', '| Show An Exam')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>EXAM DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.exams.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Exam Name:</strong>
            {{ $exam->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            {{$exam->category_exam->name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Exam Code:</strong>
            {{ $exam->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong>
            {{ date('d-m-Y',strtotime($exam->start_date)) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>End Date:</strong>
            {{ date('d-m-Y',strtotime($exam->end_date)) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Exam Subject(s):</strong>
            @foreach($exam->subjects as $subject)
                {{ $subject->name }},
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Exam Stream(s):</strong>
            @foreach($exam->streams as $stream)
                {{ $stream->name }},
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span><strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($exam->created_at)) }}</span>
        </div>
    </div>
    @include('exam.attachsubjectform')
    @include('exam.detachsubjectform')
</div>
</main>
@endsection
