@extends('layouts.admin')
@section('title', '| Add Parent')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE PARENT</h5>
                <a href="{{ route('admin.parents.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.parents.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
                            </div>
                        </div>
                    </div>
                    @include('ext._second_common_detailsdiv')
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
