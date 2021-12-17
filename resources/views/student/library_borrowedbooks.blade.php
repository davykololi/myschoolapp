@extends('layouts.student')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-transform: uppercase;">Borrowed Books</h1>
                    </div>
                    <div class="panel-body">
                        <ol>
                            @forelse($borrowedBooks as $key => $borrowedBook)
                            <li>
                                {{$borrowedBook->book->title}} 
                                <span style="color: blue">Borrowed Date:</span> {{\Carbon\Carbon::parse($borrowedBook->issued_date)->format('d-m-Y')}} 
                                <span style="color: blue">Return Date:</span> {{\Carbon\Carbon::parse($borrowedBook->return_date)->format('d-m-Y')}}
                                <span style="color: blue">Remaining Time:</span>
                                {{now()->diffInDays(\Carbon\Carbon::parse($borrowedBook->return_date))}} Days
                                {{now()->diff(\Carbon\Carbon::parse($borrowedBook->return_date))->format('%H Hours %I Minutes %S Seconds')}}  
                            </li>
                            @empty
                            <p>No books borrowed.</p>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
