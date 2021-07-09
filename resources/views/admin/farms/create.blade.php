@extends('layouts.admin')
@section('title', '| Add Farm')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE FARM</h5> 
                <a href="{{ route('admin.farms.index') }}" class="btn btn-primary pull-right"><i class="fas fa-angle-double-left">Back</i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.farms.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Farm Name">
                        </div>
                    </div>
                    @include('ext._category_farmdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
