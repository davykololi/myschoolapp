@extends('layouts.admin')
@section('title', '| Edit Sub Staff Role')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT SUB STAFF ROLE</h5> 
                <a href="{{ route('admin.position-staffs.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.position-staffs.update', $positionStaff->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Hall Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $positionStaff->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{ $positionStaff->desc }}">
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
