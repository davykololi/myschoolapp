@extends('layouts.admin')
@section('title', '| Stream Subject Create')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE STREAM SUBJECT</h5> 
                <a href="{{ route('admin.subs.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.subs.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Subject</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Eg. English F1 North">
                        </div>
                    </div>
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._attach_subjectdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
