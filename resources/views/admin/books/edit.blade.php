@extends('layouts.admin')
@section('title', '| Edit Book')

@section('content')
@role('admin')
@can('libraryAdmin')
<x-frontend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit <a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('admin.books.update', $book->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" class="form-h3" value="{{$book->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" id="author" class="form-h3" value="{{$book->author}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Units</label>
                        <div class="col-sm-10">
                            <input type="number" name="units" id="units" class="form-h3" value="{{$book->units}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Rack No.</label>
                        <div class="col-sm-10">
                            <input type="number" name="rack_no" id="rack_no" class="form-h3" value="{{$book->rack_no}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Row No.</label>
                        <div class="col-sm-10">
                            <input type="number" name="row_no" id="row_no" class="form-h3" value="{{$book->row_no}}">
                        </div>
                    </div>
                    @include('ext._attach_book_catdiv')
                    @include('ext._attach_librarydiv')
                    <button type="submit" class="update-button">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endcan
@endrole
@endsection
