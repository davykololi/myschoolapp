@extends('layouts.admin')
@section('title', '| Add Grading System')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE GRADE SYSTEM</h5>
                <a href="{{ route('admin.grade-systems.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.grade-systems.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Grade</label>
                        <div class="col-sm-10">
                            <input type="text" name="grade" id="grade" class="form-control" placeholder="Grade Eg. A, A-, B+, B etc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Points.</label>
                        <div class="col-sm-10">
                            <input type="number" name="points" id="" class="form-control" placeholder="Points Eg. 5, 4, 3 etc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Marks From.</label>
                        <div class="col-sm-10">
                            <input type="number" name="from_mark" id="" class="form-control" placeholder="From Marks Eg. 50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Marks To.</label>
                        <div class="col-sm-10">
                            <input type="number" name="to_mark" id="" class="form-control" placeholder="To Marks Eg. 75">
                        </div>
                    </div>
                    <div class="form-group">
                        @include('ext._attach_classdiv')
                    </div>
                    <div class="form-group">
                        @include('ext._attach_streamdiv')
                    </div>
                    <div class="form-group">
                        @include('ext._attach_yeardiv')
                    </div>
                    <div class="form-group">
                        @include('ext._attach_sectiondiv')
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
