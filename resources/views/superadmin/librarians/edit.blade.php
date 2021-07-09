@extends('layouts.superadmin')
@section('title', '| Edit Librarian')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit <a href="{{ route('superadmin.librarians.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.librarians.update', $librarian->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $librarian->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $librarian->first_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Middle Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $librarian->middle_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $librarian->last_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $librarian->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DOB</label>
                        <div class="col-sm-10">
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $librarian->dob }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $librarian->email }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >ID NO.</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $librarian->id_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $librarian->phone_no }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Emp. No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ $librarian->emp_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Designation</label>
                        <div class="col-sm-10">
                            <input type="text" name="designation" id="designation" class="form-control" value="{{ $librarian->designation }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Current Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="current_address" id="current_address" class="form-control" value="{{ $librarian->current_address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Permanent Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" value="{{ $librarian->permanent_address }}">
                        </div>
                    </div>
                    @include('ext._attach_librarian_rolediv')
                    @include('ext._attach_schooldiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
