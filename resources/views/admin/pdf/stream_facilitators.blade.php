@extends('layouts.pdf_landscape')
@section('title', '| Stream Facilitators')

@section('content')
    <table class="table table-bordered" id="table_style">
        <caption class="table_caption">
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>CLASS</b></td>
                <td><b>SUBJECT</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($strmSubjectTeachers))
            @forelse($strmSubjectTeachers as $key => $sub)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sub->teacher->title }} {{ $sub->teacher->name }}</td>
                <td>{{ $sub->stream->name }}</td>
                <td>{{ $sub->subject->name }}</td>
                <td>{{ $sub->teacher->phone_no }}</td>
                <td>{{ $sub->teacher->email }}</td>
            @empty
                <td colspan="10" style="color: red">
                    Currently No {{$title}} Assigned To {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>          
@endsection