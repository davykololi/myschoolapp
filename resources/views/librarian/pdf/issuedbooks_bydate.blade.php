<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_landscape_head')
</head>
<body>
    @include('partials.pdf_landscape_header')
    @include('partials.pdf_landscape_school_footer') 
<div> 
    <p style="font-size: 25px;margin-top: -20px;text-align: right;">
        <b>Date:</b> <u style="margin-right: 25px">{!! date('d/m/Y') !!}</u>
    </p>
    <div>
        <h2 style="text-transform: uppercase;text-align: center;margin-top: -10px"><u>{{$title}}</u></h2>
    </div> 
    <div>
    <table class="table table-bordered" width="82%">
        <thead>
            <tr style="background-color: black;color: white;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>CLASS</b></td>
                <td><b>TITLE</b></td>
                <td><b>SERIAL NO</b></td>
                <td><b>BORROWED</b></td>
                <td><b>RETURN</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($issuedBooks))
            @forelse($issuedBooks as $issuedBook)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $issuedBook->student->full_name }}</td>
                <td>{{ $issuedBook->student->stream->name }}</td>
                <td>{{ $issuedBook->book->title }}</td>
                <td>{{ $issuedBook->serial_no }}</td>
                <td>{{ $issuedBook->issuedDate() }}</td>
                <td>{{ $issuedBook->returnDate() }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No {{$title}} Found.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table> 
    </div>
</div>          
</body>
</html>
