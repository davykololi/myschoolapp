@extends('layouts.superadmin')
@section('title', '| Add School')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h2>CREATE SCHOOL</h2>
            <div class="panel-heading">
                <a href="{{ route('superadmin.schools.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.schools.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="School Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Initials</label>
                        <div class="col-sm-10">
                            <input type="text" name="initials" id="initials" class="form-control" placeholder="School Initials">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Logo</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control">
                        </div>
                    </div>
                    @include('ext._attach_schoolcatdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="head" id="head" class="form-control" placeholder="School Head">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Ass Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="ass_head" id="ass_head" class="form-control" placeholder="School Assistant Head">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Motto</label>
                        <div class="col-sm-10">
                            <input type="text" name="motto" id="motto" class="form-control" placeholder="School Motto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Vision</label>
                        <div class="col-sm-10">
                            <input type="text" name="vision" id="vision" class="form-control" placeholder="School Vision">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Mission</label>
                        <div class="col-sm-10">
                            <input type="text" name="mission" id="mission" class="form-control" placeholder="School Mission">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Core Values</label>
                        <div class="col-sm-10">
                            <textarea name="core_values" rows="5" cols="40" value="{!! old('core_values') !!}" id="summary-ckeditor">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="postal_address" id="postal_address" class="form-control" placeholder="Postal Address">
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
