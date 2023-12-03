@extends('layouts.admin')
@section('title', '| Add Gallery')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE GALLERY</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
                <div class="text-center mt-8">
                    @include('partials.errors')
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galleries.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Gallery Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" placeholder="Gallery Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ old('image')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" class="form-control" value="{{ old('keywords')}}" placeholder="Gallery Keywords">
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
