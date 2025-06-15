<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_landscape_A4_plain_head')
</head>
<body>
    @include('partials.pdf_landscape_header')
    @include('partials.school_landscape_logo')
    @include('partials.pdf_landscape_school_footer')
    <div>
        <div class="mt"><x-pdf-landscape-current-date/></div>
    <div>
        <h2><u>{{$title}}</u></h2>
    </div> 
        <div>  
        <table>
            <thead>
                <tr>
                    <td class="padding-10"><b>NO</b></td>
                    <td class="padding-10"><b>NAME</b></td>
                    <td class="padding-10"><b>CLASS</b></td>
                    <td class="padding-10"><b>TITLE</b></td>
                    <td class="padding-10"><b>SERIAL NO</b></td>
                    <td class="padding-10"><b>ISSUED</b></td>
                    <td class="padding-10"><b>RETURN</b></td>
                </tr>
            </thead>
            <tbody>
                @if(!empty($issuedBooks))
                @forelse($issuedBooks as $issuedBook)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $issuedBook->student->user->full_name }}</td>
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
        </div>
    </div>          
</body>
</html>
