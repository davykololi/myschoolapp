@extends('layouts.admin')
@section('title', '| Edit An Award')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT AWARD</h5> 
                <a href="{{ route('admin.rewards.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rewards.update', $reward->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $reward->name }}">
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
                            <input type="text" name="purpose" id="purpose" class="form-control" value="{{ $reward->purpose }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control" value="{{ $reward->date }}">
                        </div>
                    </div>
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_subordinatediv')
                    @include('ext._attach_streamdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
