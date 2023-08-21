@extends('layouts.pdf_landscape')
@section('title', '| Club Teachers')

@section('content')
<div class="container-fluid box"> 
    <h1 class="title"><u>{{$title}}</u></h1> 
    <div>
    <table class="table table-bordered" id="table_style">
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($clubTeachers))
            @forelse($clubTeachers as $key=>$clubTeacher)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $clubTeacher->title}} {{ $clubTeacher->name}}</td>
                <td>{{ $clubTeacher->phone_no}}</td>
                <td>{{ $clubTeacher->email}}</td>
            @empty
                <td colspan="10" style="color: red;background-color: white;padding: 5px;">
                    Teachers notyet assigned to {{$club->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>           
@endsection
