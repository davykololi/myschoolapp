<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_head')
</head>
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer') 
    <br/><br/>
    <table class="table table-bordered" id="table_style">
        <caption class="table_caption">
            <h2 class="title">
                <u>{{$title}}</u>
            </h2>
        </caption>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>CLASS</b></td>
                <td><b>PHONE NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($clubStudents))
            @forelse($clubStudents as $key=>$clubStudent)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $clubStudent->full_name}}</td>
                <td>{{ $clubStudent->stream->name}}</td>
                <td>{{ $clubStudent->phone_no}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Students notyet assigned to {{$club->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>           
</body>
</html>
