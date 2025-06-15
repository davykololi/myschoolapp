@extends('layouts.superadmin')
@section('title', '| Edit Subject Teacher')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">EDIT CLUB</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.subjectteacher.update', $strmSubTeacher->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Club Name</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="stream_id" id="stream_id" class="form-control" value="{{ $stream->id }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date of Registration</label>
                        <div class="col-sm-10">
                            <input type="date" name="reg_date" id="reg_date" class="form-control" value="{{ $club->reg_date }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
