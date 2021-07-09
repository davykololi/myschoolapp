@extends('layouts.librarian')
@section('title', '| Book Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryBooks))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>BOOKS CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('librarian.category-books.create')}}"> Create Book Category</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="25%">DESCRIPTION</th>
                        <th width="25%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($categoryBooks as $key => $categoryBook)
                        <tr>
                            <td class="table-text">
                                <div>{{$categoryBook->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryBook->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryBook->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('librarian.category-books.destroy',$categoryBook->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('librarian.category-books.show',$categoryBook->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('librarian.category-books.edit',$categoryBook->id)}}" class="btn btn-warning btn-xs">Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categoryBook->name}}?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
