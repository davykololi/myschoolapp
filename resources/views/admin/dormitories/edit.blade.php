@extends('layouts.admin')
@section('title', '| Edit Dormitory')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT DORMITORY</h5>
                <a href="{{ route('admin.dormitories.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dormitories.update', $dormitory->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $dormitory->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Bed No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="bed_no" id="bed_no" class="form-control" value="{{ $dormitory->bed_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="dom_head" id="dom_head" class="form-control" value="{{ $dormitory->dom_head }}">
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
