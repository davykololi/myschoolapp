@extends('layouts.admin')
@section('title', '| Show Dormitory')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    @include('partials.messages')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>DORMITORY DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('admin.dormitories.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Name:</strong>
            {{ $dormitory->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Code:</strong>
            {{ $dormitory->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bed No.:</strong>
            {{ $dormitory->bed_no }} Beds.
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Head:</strong>
            {{ $dormitory->dom_head }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dormitory Meetings:</strong>
            <ol>
            @forelse($dormitory->meetings as $meeting)
                <li>{{ $meeting->name }} Date: {{ $meeting->date }} Agenda: {{ $meeting->agenda }}</li>
            @empty
            <p>No meeting(s) assigned yet.</p>
            @endforelse
            </ol>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($dormitory->created_at)) }}</span>
        </div>
    </div>
    @include('dormitory.attachmeetingform')
    @include('dormitory.detachmeetingform')
</div>
</main>
@endsection
