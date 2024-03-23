<!DOCTYPE html>
<html>
<head>
    @include('partials.pdf_landscape_A4_plain_head')
</head>
<body>
    @include('partials.pdf_landscape_header')
    @include('partials.school_landscape_logo')
    @include('partials.pdf_landscape_school_footer')
<div>
    <div class="mt"><x-pdf-landscape-current-date/></div> 
    <table>
        <caption class="table_caption">
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td width="5%" class="padding-10"><b>NO</b></td>
                <td width="35%" class="padding-10"><b>TITLE</b></td>
                <td width="25%" class="padding-10"><b>AUTHOR</b></td>
                <td width="20%" class="padding-10"><b>LIBRARY</b></td>
                <td width="5%" class="padding-10"><b>ROW</b></td>
                <td width="5%" class="padding-10"><b>RACK</b></td>
                <td width="5%" class="padding-10"><b>UNITS</b></td>
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
