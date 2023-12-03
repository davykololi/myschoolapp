@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Stream Teachers')

@section('content')
<div class="container"> 
    <h1 class="title"><u>{{$title}}</u></h1> 
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>SUBJECT</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($strmSubjectTeachers))
            @forelse($strmSubjectTeachers as $strmSubjectTeacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $strmSubjectTeacher->teacher->salutation}} {{ $strmSubjectTeacher->teacher->full_name}}</td>
                <td>{{ $strmSubjectTeacher->subject->name}}</td>
                <td>{{ $strmSubjectTeacher->teacher->phone_no}}</td>
                <td>{{ $strmSubjectTeacher->teacher->email}}</td>
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
