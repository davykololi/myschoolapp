@extends('layouts.admin')
@section('title', '| Edit An Exam')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT AN EXAM</h5>
                <a href="{{ route('admin.exams.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.exams.update', $exam->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Exam Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $exam->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $exam->start_date }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $exam->end_date }}">
                        </div>
                    </div>
                    @include('ext._attach_yeardiv')
                    @include('ext._attach_termdiv')
                    @include('ext._attach_exam_categorydiv')
                    @include('ext._attach_subjectdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
