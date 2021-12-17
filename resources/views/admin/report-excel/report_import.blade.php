@extends('layouts.admin')
@section('title', '| Report Card')

@section('content')
<div class="container" style="margin-top: 5rem;">
    @include('partials.messages')
    {!! Session::forget('success') !!}
    <br />
    <h2 class="text-title">GENERATE REPORTS</h2>
    <a href="{{ route('admin.export.reportCards', 'xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
    <a href="{{ route('admin.export.reportCards', 'xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
    <a href="{{ route('admin.export.reportCards', 'csv') }}"><button class="btn btn-success">Download CSV</button></a>
    <a href="{{ route('admin.export.reportCards', 'pdf') }}"><button class="btn btn-success">Download PDF</button></a>
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('admin.import.reportCards') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-primary">Import File</button>
    </form>
</div>
@endsection

