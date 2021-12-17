@extends('layouts.admin')
@section('title', '| MarkSheets Upload & Download')

@section('content')
<div class="container">
    @include('partials.messages')
    @include('partials.errors')
    {!! Session::forget('success') !!}
    <h2 class="text-title" style="text-align: center;"><b>UPLOAD MARKSHEETS</b></h2>
    <form id="marksheets_form" action="{{ route('admin.stream.pdfMarksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Stream Results Pdf</div>
            @include('ext._stream_results_form')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number" name="pass_mark" class="form-control" placeholder="Enter Passmark">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Generate</button>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="{{ route('admin.stream.excelMarksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Stream Results Ecxel</div>
            @include('ext._stream_results_form')
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Generate</button>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="{{ route('admin.class.marksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Class Results Pdf</div>
            @include('ext._class_results_form')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number" name="pass_mark" class="form-control" placeholder="Enter Passmark">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Generate</button>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="{{ route('admin.class.excelMarksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Class Results Ecxel</div>
            @include('ext._class_results_form')
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Generate</button>
            </div>
        </div>
    </form>
    <form id="marksheets_form" action="{{ route('admin.streams.marksheetsImport') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="marksheets_title red">Upload Marksheets</div>
            @include('ext._marksheet_upload_form')
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-xs pull-right">Upload</button>
            </div>
        </div>
    </form>
</div>
@endsection

