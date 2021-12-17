@extends('layouts.superadmin')
@section('title', '| Add Stream Section')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h2>CREATE STREAM SECTION</h2>
            <div class="panel-heading">
                <a href="{{ route('superadmin.stream-sections.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.stream-sections.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Eg. North, South etc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Initials</label>
                        <div class="col-sm-10">
                            <input type="text" name="initials" id="initials" class="form-control" placeholder="Initials">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    @include('ext._attach_schooldiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
