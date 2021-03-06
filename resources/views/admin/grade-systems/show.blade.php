@extends('layouts.admin')
@section('title', '| Show Grading System')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $gradeSystem->grade }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.grade-systems.index') }}" class="btn btn-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Grade:</strong>
            {{ $gradeSystem->grade }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Points:</strong>
            {{ $gradeSystem->points }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Marks:</strong>
            {{ $gradeSystem->from_mark }}-{{ $gradeSystem->to_mark }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($gradeSystem->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
