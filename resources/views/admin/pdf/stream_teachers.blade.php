@extends('layouts.pdf_landscape')
@section('title', '| Stream Teachers')

@section('content')
<div class="container-fluid box"> 
    <h1 class="title"><u>{{$title}}</u></h1> 
    <div>
    <table class="table table-bordered" id="table_style">
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
            @if(!empty($streamSubjectTeachers))
            @forelse($streamSubjectTeachers as $streamSubjectTeacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $streamSubjectTeacher->teacher->title}} {{ $streamSubjectTeacher->teacher->full_name}}</td>
                <td>{{ $streamSubjectTeacher->subject->name}}</td>
                <td>{{ $streamSubjectTeacher->teacher->phone_no}}</td>
                <td>{{ $streamSubjectTeacher->teacher->email}}</td>
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
