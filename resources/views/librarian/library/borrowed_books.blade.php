<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_head')
</head>
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer')
    <br/> 
    <div>
        <p style="text-align: left;font-size: 25px;">Date: <u>{!! date('d/m/Y') !!}</u></p>
    </div>  
    <table class="table table-bordered" id="table_style">
        <caption class="table_caption">
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
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
                <td>{{ $issuedBook->student->full_name }}</td>
                <td>{{ $issuedBook->student->stream->name }}</td>
                <td>{{ $issuedBook->book->title }}</td>
                <td>{{ $issuedBook->serial_no }}</td>
                <td>{{ $issuedBook->issuedDate() }}</td>
                <td>{{ $issuedBook->returnDate() }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No books issued to students.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>           
</body>
</html>
