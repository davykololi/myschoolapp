@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Department Teachers')

@section('content')
<div class="container"> 
    <h2 class="title"><u>{{$title}}</u></h2>
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($deptTeachers))
            @forelse($deptTeachers as $key=>$deptTeacher)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $deptTeacher->title}} {{ $deptTeacher->full_name}}</td>
                <td>{{ $deptTeacher->phone_no}}</td>
                <td>{{ $deptTeacher->email}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Teachers notyet assigned to {{$department->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>           
@endsection