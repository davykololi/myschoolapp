@extends('layouts.superadmin')
@section('title', '| Marksheet Form')

@section('content')
<div class="container">
    @include('partials.messages')
    @include('partials.errors')
    {!! Session::forget('success') !!}
    <h2 class="text-title" style="text-align: center;"><b>DELETE MARKSHEETS</b></h2>
    <form id="marksheets_form" action="{{route('superadmin.delete.classMarksheets')}}" class="form-horizontal" method="GET">
        @csrf
        <div class="marksheets_title red">Delete Class Marksheets</div>
        @include('ext._class_results_form')
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary pull-right">Delete</button>
            </div>
        </div>        
    </form>
</div>
@endsection

