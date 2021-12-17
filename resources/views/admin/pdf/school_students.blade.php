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
                <td><b>ADM NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($students))
            @forelse($students as $student)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->stream->name}}</td>
                <td>{{ $student->admission_no}}</td>
            @empty
                <td colspan="10" style="color: red">
                    We are sorry!!. Students have not been admitted to {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>          
</body>
</html>
