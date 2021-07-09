@extends('layouts.teacher')
@section('title', '| Teacher Add Assignment')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Assignment <a href="{{ route('teacher.assignments.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('teacher.assignments.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Assignment Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Assignment Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date Given</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_given" id="date_given" class="form-control" placeholder="Assignment Date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" name="deadline" id="deadline" class="form-control" placeholder="Assignment Deadline" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" placeholder="File" required>
                        </div>
                    </div>
                    @include('ext._attach_streamdiv')
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_staffdiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
