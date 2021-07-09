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
                <td><b>HEAD</b></td>
                <td><b>ASS HEAD</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolDepts))
            @forelse($schoolDepts as $key=>$schoolDept)
            <tr>
                <td>{{ $schoolDept->id}}</td>
                <td>{{ $schoolDept->name}}</td>
                <td>{{ $schoolDept->phone_no}}</td>
                <td>{{ $schoolDept->head_name}}</td>
                <td>{{ $schoolDept->asshead_name}}</td>
            @empty
                <td colspan="10" style="color: red">
                    No department(s) formed in {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>        
</body>
</html>
