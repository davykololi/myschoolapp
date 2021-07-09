@extends('layouts.admin')
@section('title', '| Report Card')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>REPORT DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.reports.index') }}" class="btn btn-primary pull-right"> Back</a>
            <br/><br/>
            <a href="{{ route('admin.report.card',$report->id) }}"><button class="btn btn-primary btn-border">Report Card PDF</button></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $report->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Maths:</strong>
            {{ $report->maths_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>English:</strong>
            {{ $report->english_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kiswahili:</strong>
            {{ $report->kisw_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Science:</strong>
            {{ $report->science_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>C.R.E:</strong>
            {{ $report->cre_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Recommendation:</strong>
            {{ $report->recommendation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($report->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
