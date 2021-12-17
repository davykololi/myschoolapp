@extends('layouts.admin')
@section('title', '| Edit Stream Subject')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h2>EDIT STREAM SUBJECT</h2>
            <div class="panel-heading">
                <a href="{{ route('admin.subs.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.subs.update', $sub->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Subject</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{$sub->desc}}">
                        </div>
                    </div>
                    @include('ext._attach_teacherdiv')
                    @include('ext._attach_streamdiv')
                     @include('ext._attach_subjectdiv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
