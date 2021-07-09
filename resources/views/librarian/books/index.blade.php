@extends('layouts.librarian')
@section('title', '| All Books')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($books))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>BOOKS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('librarian.books.create')}}">Create</a>
                    <a class="btn btn-success" href="{{route('librarian.export.books')}}">Books Excel</a>
                    <a class="btn btn-success" href="{{route('librarian.library.books',$user->school->id)}}">Books PDF</a> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.bookhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($books as $key => $book)
                        <tr>
                            <td class="table-text">
                                <div>{{$book->title}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->category_book->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->library->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->author}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->units}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->rack_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$book->created_at}}</div>
                            </td>
                            <td>
                                <form action="{{route('librarian.books.destroy',$book->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('librarian.books.show', $book->id) }}" class="label label-success">Details</a>
                                    <a href="{{ route('librarian.books.edit', $book->id) }}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {{$book->title}}?')">
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
