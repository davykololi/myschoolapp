@extends('layouts.admin')
@section('title', '| Edit Assignment')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT ASSIGNMENT</h5>
                <a href="{{ route('admin.assignments.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.assignments.update', $assignment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Assignment Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $assignment->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date Given</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control" value="{{ $assignment->date }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $assignment->deadline }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" value="{{ $assignment->file }}">
                        </div>
                    </div>
                    @include('ext._attach_streamdiv')
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
