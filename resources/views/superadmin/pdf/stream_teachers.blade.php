@extends('layouts.pdf_A4plain_portrait')
@section('title', '| Stream Teachers')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <h2 class="title"><u>{{$title}}</u></h2> 
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>TEACHER</b></td>
                <td><b>MOBILE</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamTeachers))
            @forelse($streamTeachers as $streamTeacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $streamTeacher->user->salutation}} {{ $streamTeacher->user->full_name}}</td>
                <td>{{ $streamTeacher->phone_no}}</td>
                <td>{{ $streamTeacher->user->email}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Teachers notyet assigned to {{$stream->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table> 
    </div>
</div        
@endsection
