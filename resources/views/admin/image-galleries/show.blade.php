@extends('layouts.admin')
@section('title', '| Image Gallery Details')

@section('content')
@role('admin')
@can('dataOfficer')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $imageGallery->title }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
            <div class="text-center mt-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $imageGallery->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img style="width: 50%" src="{{ $imageGallery->image_url }}" alt="{{ $imageGallery->title }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $imageGallery->description }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created By:</strong>
            {{ $imageGallery->admin->full_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> 
                {{ date("F j,Y,g:i a",strtotime($imageGallery->created_at)) }}
            </span>
        </div>
    </div>
</div>
</main>
@endcan
@endrole
@endsection
