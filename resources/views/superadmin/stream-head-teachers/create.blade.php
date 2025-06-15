@extends('layouts.superadmin')
@section('title', '| Add Stream Head Teacher')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">ADD STREAM HEAD TEACHER</h5>
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.stream-head-teachers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Teacher's Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Teacher's Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name Initials</label>
                        <div class="col-sm-10">
                            <input type="text" name="name_initials" id="name_initials" class="form-control" placeholder="Name Initials">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" placeholder="The Description">
                        </div>
                    </div>
                    @include('ext._get_streams_ids')
                    
                    <button type="submit" class="submit-button">CREATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
