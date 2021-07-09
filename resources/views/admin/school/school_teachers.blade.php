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
            <h2 class="title">
                <u>{{$title}}</u>
            </h2>
        </caption>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
                <td><b>ROLE</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolTeachers))
            @forelse($schoolTeachers as $schoolTeacher)
            <tr>
                <td>{{ $schoolTeacher->id }}</td>
                <td>{{ $schoolTeacher->title }} {{ $schoolTeacher->full_name }}</td>
                <td>{{ $schoolTeacher->phone_no }}</td>
                <td>{{ $schoolTeacher->email }}</td>
                <td>{{ $schoolTeacher->position_teacher->name }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No teachers assigned to {{$school->name}} yet.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>          
</body>
</html>
