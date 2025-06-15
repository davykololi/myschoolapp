@extends('layouts.admin')
@section('title', '| Add An Award')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE AWARD</h5> 
                <a href="{{ route('admin.awards.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.awards.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Award Name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-sm-10">
                            @include('ext._category_awarddiv')
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
                    @include('ext._attach_subordinatediv')
                    @include('ext._attach_streamdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endrole
@endsection
