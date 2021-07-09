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
            @if(!empty($subStaffs))
            @forelse($subStaffs as $subStaff)
            <tr>
                <td>{{ $subStaff->id }}</td>
                <td>{{ $subStaff->title }} {{ $subStaff->full_name }}</td>
                <td>{{ $subStaff->phone_no }}</td>
                <td>{{ $subStaff->email }}</td>
                <td>{{ $subStaff->position_staff->name }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No subordinade stafs assigned to {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>        
</body>
</html>
