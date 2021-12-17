@extends('layouts.admin')
@section('title', '| Add Teacher')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE TEACHER</h5>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.teachers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Blood Group: <span class="text-danger">*</span></label>
                                @include('ext._blood_group_div')
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teacher Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_teacher_rolediv')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    		<div class="form-group">
                            	<label>More About Teacher: <span class="text-danger">*</span></label>
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
