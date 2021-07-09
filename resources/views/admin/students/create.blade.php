@extends('layouts.admin')
@section('title', '| Add Student')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE STUDENT</h5>
                <a href="{{ route('admin.students.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.students.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._common_detailsdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Admission No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="admission_no" id="admission_no"value="{!! old('admission_no') !!}" class="form-control" placeholder="Admission No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DOB</label>
                        <div class="col-sm-10">
                            <input type="date" name="dob" id="dob" value="{!! old('dob') !!}" class="form-control" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Postal Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="postal_address" id="postal_address" value="{!! old('postal_address') !!}" class="form-control" placeholder="Postal Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" value="{!! old('phone_no') !!}" class="form-control" placeholder="Phone Number.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DOA</label>
                        <div class="col-sm-10">
                            <input type="date" name="doa" id="doa" value="{!! old('doa') !!}" class="form-control" placeholder="Date of Admission">
                        </div>
                    </div>
                    @include('ext._attach_student_rolediv')
                    @include('ext._attach_streamdiv')
                    @include('ext._attach_intakediv')
                    @include('ext._attach_dormitorydiv')
                    @include('ext._attach_parentdiv')
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
