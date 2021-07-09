@extends('layouts.admin')
@section('title', '| Class Reports')

@section('content')
<div class="container" style="margin-top: 5rem;">
    @include('partials.messages')
    {!! Session::forget('success') !!}
    <br />
    <h2 class="text-title">GENERATE CLASS REPORTS MULTISHEETS</h2>
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('admin.import.reportCards') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <button class="btn btn-primary">Import File</button>
    </form>
</div>
@endsection

