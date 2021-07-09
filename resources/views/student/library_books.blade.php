@extends('layouts.student')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;text-align: center;margin-top: 30px;margin-bottom: 0">
                            Library Books
                        </h1>
                    </div>
                    <br/>
                    <table class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <td><b>NO</b></td>
                                <td><b>TITLE</b></td>
                                <td><b>CATEGORY</b></td>
                                <td><b>AUTHOR</b></td>
                                <td><b>LIBRARY</b></td>
                                <td><b>RACK NO</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($books))
                            @forelse($books as $key => $book)
                            <tr>
                                <td>{{ $book->id}}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->category_book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->library->name }}</td>
                                <td>{{ $book->rack_no }}</td>
                            @empty
                                <td colspan="10" style="color: red">
                                     {{ Auth::user()->school->name}} libraries have no books at the moment.
                                </td>
                            </tr>
                            @endforelse
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection