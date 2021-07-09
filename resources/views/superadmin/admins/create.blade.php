@extends('layouts.superadmin')
@section('title', '| Add Admin')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-primary"><span class="btn-label"><i class="flaticon-shapes"></i></span>Add Admin</button>
                <a href="{{ route('superadmin.admins.index') }}" class="btn btn-primary btn-xs pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.admins.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._common_detailsdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >ID No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_no" id="id_no" class="form-control" placeholder="ID No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Emp. No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="emp_no" id="emp_no" class="form-control" placeholder="Employment No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DOB</label>
                        <div class="col-sm-10">
                            <input type="date" name="dob" id="dob" class="form-control" placeholder="DOB">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Designation</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Postal Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="postal_address" id="postal_address" class="form-control" placeholder="Postal Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number." required>
                        </div>
                    </div>
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
