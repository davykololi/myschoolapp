@extends('layouts.admin')
@section('title', '| Add Notes')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE NOTES</h5> 
                <a href="{{ route('admin.notes.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.notes.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File:</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" placeholder="File For Upload">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description:</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    @include('ext._attach_departmentdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_subjectdiv')
                    @include('ext._attach_standard_subjectdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
