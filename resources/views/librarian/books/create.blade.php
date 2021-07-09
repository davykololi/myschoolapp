@extends('layouts.librarian')
@section('title', '| Add A Book')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Create <a href="{{ route('librarian.books.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('librarian.books.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-control" placeholder="The Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Authour</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" id="author" class="form-control" placeholder="Author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Units</label>
                        <div class="col-sm-10">
                            <input type="number" name="units" id="units" class="form-control" placeholder="Units">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Rack No.</label>
                        <div class="col-sm-10">
                            <input type="number" name="rack_no" id="rack_no" class="form-control" placeholder="Rack Number">
                        </div>
                    </div>
                    @include('ext._attach_book_catdiv')
                    @include('ext._attach_schooldiv')
                    @include('ext._attach_librarydiv')
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
