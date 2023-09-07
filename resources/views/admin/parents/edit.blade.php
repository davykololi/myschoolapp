@extends('layouts.admin')
@section('title', '| Edit Parent')

@section('content')
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT PARENT</h5>
                <a href="{{ route('admin.parents.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.parents.update', $myParent->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="salutation" id="salutation" class="form-control" value="{{ $myParent->salutation }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $myParent->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control" value="{{ $myParent->image }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $myParent->email }}">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >ID NO.</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $myParent->id_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $myParent->phone_no }}">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="bg-gray-900 md:hover:bg-white md:hover:text-black md:hover:border-blue-800 items-center text-white px-6 py-0.5 border-2 mt-2 border-white rounded-md" {{ $myParent->lock }}>
                            Update
                        </button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
