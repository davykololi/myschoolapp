@extends('layouts.superadmin')
@section('title', '| Edit Matron')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Matron <a href="{{ route('superadmin.matrons.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.matrons.update', $matron->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $matron->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $matron->first_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Middle Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $matron->middle_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $matron->last_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $matron->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DOB</label>
                        <div class="col-sm-10">
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $matron->dob }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $matron->email }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >ID NO.</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $matron->id_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $matron->phone_no }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Emp. No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ $matron->emp_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Designation</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $matron->designation }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Current Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="current_address" id="current_address" class="form-control" value="{{ $matron->current_address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Permanent Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="{{ $matron->permanent_address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >History</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="summary-ckeditor" name="history">{!! $matron->history !!}</textarea>
                        </div>
                    </div>
                    @include('ext._attach_schooldiv')
                    @include('ext._attach_matron_rolediv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
