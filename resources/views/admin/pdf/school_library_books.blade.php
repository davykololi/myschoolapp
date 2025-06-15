@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Library Books')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-landscape-current-date/></div>
    <div>
    <h2 class="title" style="margin-top: -25px"><u>{{ $title }}</u></h2>
    <p style="margin-left: -80px;"><u><b>Total:</b> {{ $totalNumberOfBooks }} <i>Books</i></u></p>
    <div>
    <table>
        <thead class="table-bordered">
            <tr>
                <td><b>NO</b></td>
                <td><b>TITLE</b></td>
                <td><b>AUTHOR</b></td>
                <td><b>RACK NO</b></td>
                <td><b>ROW NO</b></td>
                <td><b>UNITS</b></td>
                <td><b>LIBRARY</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($books))
            @forelse($books as $book)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left">{{ $book->title }}</td>
                <td class="table-left">{{ $book->author }}</td>
                <td class="table-left">{{ $book->rack_no }}</td>
                <td class="table-left">{{ $book->row_no }}</td>
                <td class="table-left">{{ $book->units }}</td>
                <td class="table-left blue">{{ $book->library->name }}</td>
            @empty
                <td colspan="10" style="color: red">
                    We are sorry!!. {{ $school->name }} libraries have no books at the moment.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table> 
    </div>
    </div>
</div>            
@endsection
