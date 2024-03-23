@extends('layouts.superadmin')
@section('title', '| Show Year')

@section('content')
<x-backend-main>
<div role="main" class="container"  style="margin-top: 5px" id="main">
    @include('partials.messages')
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $year->year }} Details</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('superadmin.years.index') }}" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Year:</strong>
            {{ $year->year }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dascription:</strong>
            {{ $year->desc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($year->created_at)) }}
            </span>
        </div>
    </div>
</div>
</div>
</x-backend-main>
@endsection
