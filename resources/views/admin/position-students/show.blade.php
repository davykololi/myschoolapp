@extends('layouts.admin')
@section('title', '| Show Student Role')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>STUDENT ROLE</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.position-students.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $positionStudent->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $positionStudent->desc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slug:</strong>
            {{ $positionStudent->slug }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($positionStudent->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
