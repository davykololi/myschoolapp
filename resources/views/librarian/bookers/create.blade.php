@extends('layouts.librarian')
@section('title', '| Add Issued Book')

@section('content')
<x-frontend-main>
<div class="w-full">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Create <a href="{{ route('librarian.bookers.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('librarian.bookers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._get_students_ids')
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
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" name="issued_date" id="issued_date" class="form-control" placeholder="Issued Date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Return Date</label>
                        <div class="col-sm-10">
                            <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                <input type="text" name="return_date" id="return_date" class="form-control" placeholder="Return Date">
                            </div>
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
</x-frontend-main>
@endsection
