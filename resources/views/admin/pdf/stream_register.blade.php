@extends('layouts.pdf_portrait')
@section('title', '| Stream Register Form')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <div>
    <table>
        <thead>
            <tr>
                <td width="5%"><b>NO</b></td>
                <td width="39%"><b>NAME</b></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
                <td width="8%" class="white"></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamStudents))
            @forelse($streamStudents as $key => $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->user->full_name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            @empty
                <td colspan="10" style="color: red">
                    Students notyet assigned to {{$stream->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>               
@endsection