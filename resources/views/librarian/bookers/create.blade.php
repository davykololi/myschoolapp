@extends('layouts.librarian')
@section('title', '| Add Issued Book')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Create <a href="{{ route('librarian.bookers.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('librarian.bookers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_bookdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Serial No.</label>
                        <div class="col-sm-10">
                            <input type="text" name="serial_no" id="serial_no" class="form-control" placeholder="Serial Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Issued Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="issued_date" id="issued_date" class="form-control" placeholder="Issued Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Return Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="return_date" id="return_date" class="form-control" placeholder="Return Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Recommentation</label>
                        <div class="col-sm-10">
                            <input type="text" name="recommentation" id="recommentation" class="form-control" placeholder="Recommentation">
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
