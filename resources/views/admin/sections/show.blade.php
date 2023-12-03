@extends('layouts.admin')
@section('title', '| Show School Section')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $section->name }} Details</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.sections.index') }}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Section:</strong>
            {{ $section->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $section->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Created On: </strong> {{ date("F j,Y,g:i a",strtotime($section->created_at)) }}
            </span>
        </div>
    </div>
</div>
</main>
@endsection
