@extends('layouts.admin')
@section('title', '| Timetable Details')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="row">
                <div class="col-md-12 margin-tb">
                    <div class="pull-left">
                        <h2>TIMETABLE DETAILS</h2>
                        <br/>
                    </div>
                    <div class="text-center uppercase text-2xl">
                        @include('partials.messages')
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.timetables.index') }}" class="label label-primary pull-right"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>File:</strong>
                        <a href="{{route('admin.timetable.download',$timetable->id)}}" class="btn btn-outline-warning">Download</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $timetable->desc }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>School:</strong>
                        {{ $timetable->school->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stream:</strong>
                        {{ $timetableStreamName }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <span>
                            <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($timetable->created_at)) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
