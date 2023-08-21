@extends('layouts.librarian')
@section('title', '| Edit Book Category')

@section('content')
<x-frontend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Book Category<a href="{{ route('librarian.category-books.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('librarian.category-books.update', $categoryBook->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Category</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $categoryBook->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{ $categoryBook->desc }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
