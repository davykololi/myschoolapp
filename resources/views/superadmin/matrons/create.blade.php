@extends('layouts.superadmin')
@section('title', '| Add Matron')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h2>CREATE MATRON</h2>
            <div class="panel-heading">
                <a href="{{ route('superadmin.matrons.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.matrons.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Matron Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_matron_rolediv')
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School: <span class="text-danger">*</span></label>
                                @include('ext._attach_schooldiv')
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>More About Matron: <span class="text-danger">*</span></label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('ext._passworddiv')
                    </div>
                    @include('ext._submit_register_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
