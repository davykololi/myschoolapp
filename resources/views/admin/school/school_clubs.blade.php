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
                <td><b>REG DATE</b></td>
            </tr>
        </thead>
        <tbody>
        @if(!empty($clubs))
            @forelse($clubs as $key=>$club)
            <tr>
                <td>{{ $club->id}}</td>
                <td>{{ $club->name}}</td>
                <td>{{ $club->regDate()}}</td>
            @empty
                <td colspan="10" style="color: red">
                    No club(s) have been registered in {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>         
</body>
</html>
