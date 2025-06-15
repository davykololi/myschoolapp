@extends('layouts.superadmin')
@section('title', '| Add Dormitory')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE DORMITORY</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.dormitories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Dormitory Name">
                            @error('name')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Bed No.</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" max="100" name="bed_no" id="bed_no" class="form-control" value="{{ old('bed_no') }}" placeholder="Bed No.">
                            @error('bed_no')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="dom_head" id="dom_head" class="form-control" value="{{ old('dom_head') }}" placeholder="Dormitory Head">
                            @error('dom_head')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Dormitory Assistant Head</label>
                        <div class="col-sm-10">
                            <input type="text" name="ass_head" id="ass_head" class="form-control" value="{{ old('ass_head') }}" placeholder="Dormitory Assistant Head">
                            @error('ass_head')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
