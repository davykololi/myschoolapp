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
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>TITLE</b></td>
                <td><b>AUTHOR</b></td>
                <td><b>LIBRARY</b></td>
                <td><b>RACK NO</b></td>
                <td><b>UNITS</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($books))
            @forelse($books as $key=>$bk)
            <tr>
                <td>{{ $bk->id }}</td>
                <td>{{ $bk->title }}</td>
                <td>{{ $bk->author }}</td>
                <td>{{ $bk->library->name }}</td>
                <td>{{ $bk->rack_no }}</td>
                <td>{{ $bk->units }}</td>
            @empty
                <td colspan="10" style="color: red">
                    The library have no books.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>           
</body>
</html>
