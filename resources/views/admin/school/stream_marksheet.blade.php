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
                <td><b>NAME</b></td>
                <td><b>MATHS</b></td>
                <td><b>ENG</b></td>
                <td><b>KISW</b></td>
                <td><b>CHEM</b></td>
                <td><b>BIO</b></td>
                <td><b>PHYSICS</b></td>
                <td><b>CRE</b></td>
                <td><b>ISLAM</b></td>
                <td><b>HIST</b></td>
                <td><b>GHC</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($marks))
            @forelse($marks as $mark)
            <tr>
                <td>{{ $mark->name }}</td>
                <td>{{ $mark->mathematics }}</td>
                <td>{{ $mark->english }}</td>
                <td>{{ $mark->kiswahili }}</td>
                <td>{{ $mark->chemistry }}</td>
                <td>{{ $mark->biology }}</td>
                <td>{{ $mark->physics }}</td>
                <td>{{ $mark->cre }}</td>
                <td>{{ $mark->islam }}</td>
                <td>{{ $mark->history }}</td>
                <td>{{ $mark->ghc }}</td>
            @empty
                <td colspan="10" style="color: red">
                    {{$title}} Not Found.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>          
</body>
</html>
