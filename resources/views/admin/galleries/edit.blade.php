@extends('layouts.admin')
@section('title', '| Edit Gallery')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT GALLERY</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" value="{{$gallery->description}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $gallery->image}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" name="keywords" id="keywords" class="form-control" value="{{ $gallery->keywords}}">
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
