@extends('layouts.superadmin')
@section('title', '| Add Section')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE SECTION</h5> 
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">
                    <i class="fas fa-angle-double-left">Back</i>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.sections.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Section Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    <div class="my-1">
                        @include('ext._submit_create_button')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
