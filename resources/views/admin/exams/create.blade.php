@extends('layouts.admin')
@section('title', '| Add An Exam')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE AN EXAM</h5>
                <a href="{{ route('admin.exams.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.exams.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Exam Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Exam Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date">
                        </div>
                    </div>
                    @include('ext._attach_exam_categorydiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Subjects</label>
                        <div class="col-sm-10">
                            {!! Form::select('subjects[]',$subjects,old('subjects'),['class'=>'form-control','multiple'=>'multiple']) !!}
                        </div>
                    </div>
                    @include('ext._attach_yeardiv')
                    @include('ext._attach_termdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
