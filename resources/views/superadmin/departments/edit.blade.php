@extends('layouts.superadmin')
@section('title', '| Edit Department')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT DEPARTMENT</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.departments.update', $department->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $department->phone_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="head_name" id="head_name" class="form-control" value="{{ $department->head_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Assistant Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="asshead_name" id="asshead_name" class="form-control" value="{{ $department->asshead_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Motto</label>
                        <div class="col-sm-10">
                            <input type="text" name="motto" id="motto" class="form-control" value="{{ $department->motto }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Vision</label>
                        <div class="col-sm-10">
                            <input type="text" name="vision" id="vision" class="form-control" value="{{ $department->vision }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Department Mission</label>
                        <div class="col-sm-10">
                            <input type="text" name="mission" id="mission" class="form-control" value="{{ $department->mission }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
