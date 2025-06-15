@extends('layouts.superadmin')
@section('title', '| Add Library')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE LIBRARY</h5> 
                <a href="{{ url()->previous() }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.libraries.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Library Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Library Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Librarian</label>
                        <div class="col-sm-10">
                            <input type="text" name="lib_head" id="lib_head" class="form-control" placeholder="Librarian">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Ass. Librarian</label>
                        <div class="col-sm-10">
                            <input type="text" name="lib_asshead" id="lib_asshead" class="form-control" placeholder="Assistant Librarian">
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endrole
@endsection
