@extends('layouts.admin')
@section('title', '| Edit Grading System')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT GRADING SYSTEM</h5>
                <a href="{{ route('admin.grade-systems.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.grade-systems.update', $gradeSystem->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Grade</label>
                        <div class="col-sm-10">
                            <input type="text" name="grade" id="grade" class="form-control" value="{{$gradeSystem->grade}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Points.</label>
                        <div class="col-sm-10">
                            <input type="number" name="points" id="" class="form-control" value="{{$gradeSystem->points}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Marks From.</label>
                        <div class="col-sm-10">
                            <input type="number" name="from_mark" id="" class="form-control" value="{{$gradeSystem->from_mark}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Marks To.</label>
                        <div class="col-sm-10">
                            <input type="number" name="to_mark" id="" class="form-control" value="{{$gradeSystem->to_mark}}">
                        </div>
                    </div>
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_streamdiv')
                    @include('ext._attach_deptdiv')
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_staffdiv')
                    @include('ext._attach_librariandiv')
                    @include('ext._attach_matrondiv')
                    @include('ext._attach_accountantdiv')
                    @include('ext._attach_classdiv')
                    @include('ext._attach_parentdiv')
                    @include('ext._attach_dormitorydiv')
                    @include('ext._attach_subjectdiv')
                    @include('ext._attach_standard_subjectdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
