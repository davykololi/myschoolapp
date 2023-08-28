<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_landscape_head')
</head>
<body>
    @include('partials.pdf_landscape_header')
    @include('partials.pdf_landscape_school_footer')
<div style="margin-top: -40px;">  
    <table class="table table-bordered" width="82%">
        <caption class="table_caption">
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr style="background-color: black; color: white;">
                <td class="padding-10"><b>NO</b></td>
                <td class="padding-10"><b>TITLE</b></td>
                <td class="padding-10"><b>AUTHOR</b></td>
                <td class="padding-10"><b>LIBRARY</b></td>
                <td class="padding-10"><b>ROW NO</b></td>
                <td class="padding-10"><b>RACK NO</b></td>
                <td class="padding-10"><b>UNITS</b></td>
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
                <td>{{ $bk->row_no }}</td>
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
</div>           
</body>
</html>
