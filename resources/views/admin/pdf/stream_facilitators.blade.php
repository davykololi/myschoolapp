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
                <td><b>SUBJECT</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($classSubjects))
            @forelse($classSubjects as $key => $sub)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sub->teacher->title }} {{ $sub->teacher->full_name }}</td>
                <td>{{ $sub->stream->name }}</td>
                <td>{{ $sub->subject->name }}</td>
                <td>{{ $sub->teacher->phone_no }}</td>
                <td>{{ $sub->teacher->email }}</td>
            @empty
                <td colspan="10" style="color: red">
                    Currently No {{$title}} Assigned To {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>          
</body>
</html>
