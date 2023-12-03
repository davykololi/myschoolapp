@extends('layouts.pdf_landscape')
@section('title', '| School Teachers')

@section('content')
<div class="container"> 
    <h1 class="title"><u>{{$title}}</u></h1> 
    <div>
    <table class="table table-bordered" style="width: 82%;">
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
                <td><b>ROLE</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolTeachers))
            @forelse($schoolTeachers as $schoolTeacher)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schoolTeacher->title }} {{ $schoolTeacher->full_name }}</td>
                <td>{{ $schoolTeacher->phone_no }}</td>
                <td>{{ $schoolTeacher->email }}</td>
                <td>{{ $schoolTeacher->role->name }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No teachers assigned to {{$school->name}} yet.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>           
@endsection
