<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_head')
</head>
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer') 
    <br/><br/> 
    <table class="table table-bordered" id="table_style">
        <caption class="table_caption">
            <h2><u>{{ $title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td><b>NAME</b></td>
                <td><b>ADM NO</b></td>
                <td><b>PHONE NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamStudents))
            @forelse($streamStudents as $streamStudent)
            <tr>
                <td>{{ $streamStudent->full_name}}</td>
                <td>{{ $streamStudent->admission_no}}</td>
                <td>{{ $streamStudent->phone_no}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Students notyet assigned to {{$stream->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>           
</body>
</html>
