@extends('layouts.superadmin')
@section('title', '| Edit Stream')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT STREAM</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.streams.update', $stream->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Stream Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $stream->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Stream Head Teacher</label>
                        <div class="col-sm-10">
                            <input type="text" name="class_teacher" id="class_teacher" class="form-control" value="{{ $stream->class_teacher }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Stream Head Student</label>
                        <div class="col-sm-10">
                            <input type="text" name="class_prefect" id="class_prefect" class="form-control" value="{{ $stream->class_prefect }}">
                        </div>
                    </div>
                    @include('ext._attach_classdiv')
                    @include('ext._attach_stream_sectiondiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
