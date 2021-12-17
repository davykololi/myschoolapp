@extends('layouts.admin')
@section('title', '| Class Reports')

@section('content')
<div class="container">
    @include('partials.messages')
    {!! Session::forget('success') !!}
    <h2 class="text-title">GENERATE CLASS REPORTS MULTISHEETS</h2>
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('admin.import.reportCards') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-primary">Import File</button>
    </form>

    <form id="marksheets_form" action="{{ route('admin.streams.reportCardStore') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="marksheets_title red">Streams Report Cards Sheets Upload</div>
        @include('ext._attach_yeardiv')
        @include('ext._attach_termdiv')
        @include('ext._attach_classdiv')
        @include('ext._attach_teacherdiv')
        <input type="file" name="file"/>
        <button class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection

