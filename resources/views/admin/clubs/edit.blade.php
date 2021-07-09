@extends('layouts.admin')
@section('title', '| Edit Club')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT CLUB</h5>
                <a href="{{ route('admin.clubs.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clubs.update', $club->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Club Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $club->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date of Registration</label>
                        <div class="col-sm-10">
                            <input type="date" name="reg_date" id="reg_date" class="form-control" value="{{ $club->reg_date }}">
                        </div>
                    </div>
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_staffdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
