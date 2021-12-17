@extends('layouts.admin')
@section('title', '| Generate Student Report Card')

@section('content')
<div class="container">
    @include('partials.messages')
    @include('partials.errors')
    {!! Session::forget('success') !!}
    <div><h1 class="text-title" style="text-align: center;"><b>STUDENT REPORT CARD GENERATION</b></h1></div>
    <form id="marksheets_form" action="{{ route('admin.classTotals.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="marksheets_title red">Step:1 Generate Overal Class Positions</div>
        <span>Please ensure you press this button <a href="{{route('admin.classTotals.clear')}}">TRUNCATE</a> everytime you generate class positions</span>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>First Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_onediv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Second Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_twodiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Third Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_threediv')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Year: <span class="text-danger">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Term: <span class="text-danger">*</span></label>
                    @include('ext._attach_termdiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Class: <span class="text-danger">*</span></label>
                    @include('ext._attach_classdiv')
                </div>
            </div>
        </div>

        
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </div>
    </form>
    <hr/>
    <form id="marksheets_form" action="{{ route('admin.streamTotals.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}
        <div class="marksheets_title red">Step:2 Generate Stream Positions</div>
        <span>
            Please ensure you press this button <a href="{{route('admin.streamTotals.clear')}}">TRUNCATE</a> everytime you generate stream positions
        </span>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>First Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_onediv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Second Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_twodiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Third Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_threediv')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Year: <span class="text-danger">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Term: <span class="text-danger">*</span></label>
                    @include('ext._attach_termdiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Class: <span class="text-danger">*</span></label>
                    @include('ext._attach_classdiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Stream: <span class="text-danger">*</span></label>
                    @include('ext._attach_streamdiv')
                </div>
            </div>
        </div>

        
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </div>
    </form>
    <hr/>
    <form id="marksheets_form" action="{{ route('admin.studentPdf.reportCard') }}" class="form-horizontal" method="get" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="marksheets_title red">Step:3 Generate Report Card</div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>First Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_onediv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Second Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_twodiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Third Exam: <span class="text-danger">*</span></label>
                    @include('ext._exam_threediv')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Year: <span class="text-danger">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Term: <span class="text-danger">*</span></label>
                    @include('ext._attach_termdiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Class: <span class="text-danger">*</span></label>
                    @include('ext._attach_classdiv')
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Stream: <span class="text-danger">*</span></label>
                    @include('ext._attach_streamdiv')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Student Name: <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Student Name"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Closing Date: <span class="text-danger">*</span></label>
                    <input type="date" name="closing_date" class="form-control" placeholder="Enter Closing Date"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Opening Date: <span class="text-danger">*</span></label>
                    <input type="date" name="opening_date" class="form-control" placeholder="Enter Opening Date"/>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </div>
    </form>
</div>
@endsection

