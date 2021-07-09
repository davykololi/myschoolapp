@extends('layouts.librarian')
@section('title', '| Show Book Category')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>BOOK CATEGORY DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('librarian.category-books.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $categoryBook->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $categoryBook->desc }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slug:</strong>
            {{ $categoryBook->slug }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <span>
                <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($categoryBook->created_at)) }}</span>
        </div>
    </div>
</div>
</main>
@endsection
