@extends('layouts.superadmin')
@section('title', '| Add Admin')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary"><span class="btn-label"><i class="flaticon-shapes"></i></span>Create</button>
                <a href="{{ route('superadmin.admins.index') }}" class="btn btn-primary btn-xs pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.admins.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    @include('ext._attach_schooldiv')
                    @include('ext._content_div')
                    @include('ext._passworddiv')
                    @include('ext._submit_register_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
