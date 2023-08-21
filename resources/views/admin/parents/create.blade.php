@extends('layouts.admin')
@section('title', '| Add Parent')

@section('content')
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE PARENT</h5>
                <a href="{{ route('admin.parents.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.parents.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Salutation</label>
                        <div class="col-sm-10">
                            <input type="text" name="salutation" id="salutation" value="{{old('salutation')}}" class="form-control" placeholder="Mr./Mrs./Miss./Pstr./Dr./Rev.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >ID NO.</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_no" id="id_no" class="form-control" placeholder="ID No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number.">
                        </div>
                    </div>
                    @include('ext._passworddiv')
                    @include('ext._submit_register_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
