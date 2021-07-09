@extends('layouts.admin')
@section('title', '| MarkSheets Upload & Download')

@section('content')
<div class="container" style="margin-top: 5rem;">
    @include('partials.messages')
    @include('partials.errors')
    {!! Session::forget('success') !!}
    <h2 class="text-title">UPLOAD MARKSHEETS</h2>
    <form id="marksheets_form" action="{{ route('admin.stream.marksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Stream Results Pdf</div>
        @include('ext._attach_yeardiv')
        @include('ext._attach_termdiv')
        @include('ext._attach_streamdiv')
        @include('ext._attach_examdiv')
        <button class="btn btn-primary">Stream Results PDF</button>
    </form>
    <form id="marksheets_form" action="{{ route('admin.streams.marksheets') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="marksheets_title red">Streams Excel Marksheets Upload</div>
        @include('ext._attach_yeardiv')
        @include('ext._attach_termdiv')
        @include('ext._attach_classdiv')
        @include('ext._attach_examdiv')
        @include('ext._attach_teacherdiv')
        <input type="file" name="file"/>
        <button class="btn btn-primary">Upload Streams Marksheets</button>
    </form>

    <form id="marksheets_form" action="{{ route('admin.class.marksheet') }}" class="form-horizontal" method="get">
        {{ csrf_field() }}
        <div class="marksheets_title red">Class Results Pdf</div>
        @include('ext._attach_yeardiv')
        @include('ext._attach_termdiv')
        @include('ext._attach_classdiv')
        @include('ext._attach_examdiv')
        <button class="btn btn-primary">Class Results PDF</button>
    </form>
    
    <form id="marksheets_form" action="{{ route('admin.classMarksheet.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="marksheets_title red">Class Excel Marksheet Upload</div>
        @include('ext._attach_yeardiv')
        @include('ext._attach_termdiv')
        @include('ext._attach_classdiv')
        @include('ext._attach_examdiv')
        @include('ext._attach_teacherdiv')
        <input type="file" name="file"/>
        <button class="btn btn-primary">Upload Class Marksheet</button>
    </form>
</div>
@endsection

