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
        <br/>
        <thead>
            <tr>
                <td><b>NAME</b></td>
                <td><b>SUBJECT</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamSubjects))
            @forelse($streamSubjects as $streamSubject)
            <tr>
                <td>{{ $streamSubject->teacher->title}} {{ $streamSubject->teacher->full_name}}</td>
                <td>{{ $streamSubject->subject->name}}</td>
                <td>{{ $streamSubject->teacher->phone_no}}</td>
                <td>{{ $streamSubject->teacher->email}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Teachers notyet assigned to {{$stream->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>         
</body>
</html>
