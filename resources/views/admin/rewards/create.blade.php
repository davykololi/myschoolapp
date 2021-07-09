@extends('layouts.admin')
@section('title', '| Create Award')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE AWARD</h5> 
                <a href="{{ route('admin.rewards.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rewards.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Award Name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Purpose</label>
                        <div class="col-sm-10">
                            <input type="text" name="purpose" id="purpose" class="form-control" placeholder="Purpose" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="last_name" class="form-control" placeholder="Date Given" required="">
                        </div>
                    </div>
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_staffdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
