@extends('layouts.superadmin')
@section('title', '| Edit School')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h2>EDIT SCHOOL</h2>
            <div class="panel-heading">
                <a href="{{ route('superadmin.schools.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.schools.update', $school->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $school->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Initials</label>
                        <div class="col-sm-10">
                            <input type="text" name="initials" id="initials" class="form-control" value="{{ $school->initials }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Logo</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $school->image }}">
                        </div>
                    </div>
                    @include('ext._attach_schoolcatdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="head" id="head" class="form-control" value="{{ $school->head }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Ass Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="ass_head" id="ass_head" class="form-control" value="{{ $school->ass_head }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Motto</label>
                        <div class="col-sm-10">
                            <input type="text" name="motto" id="motto" class="form-control" value="{{ $school->motto }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Vision</label>
                        <div class="col-sm-10">
                            <input type="text" name="vision" id="vision" class="form-control" value="{{ $school->vision }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Mission</label>
                        <div class="col-sm-10">
                            <input type="text" name="mission" id="mission" class="form-control" value="{{ $school->mission }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $school->email }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Core Vaues</label>
                        <div class="col-sm-10">
                            <textarea name="core_values" rows="5" cols="40" class="form-control" id="summary-ckeditor">
                                {!! $school->core_values !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >School Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="postal_address" id="postal_address" class="form-control" value="{{ $school->postal_address }}">
                        </div>
                    </div> 
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
