@extends('layouts.admin')
@section('title', '| Add Dormitory')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE DORMITORY</h5>
                <a href="{{ route('admin.dormitories.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dormitories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Dormitory Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Bed No.</label>
                        <div class="col-sm-10">
                            <input type="number" name="bed_no" id="bed_no" class="form-control" placeholder="Bed No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="dom_head" id="dom_head" class="form-control" placeholder="Dormitory Head">
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
