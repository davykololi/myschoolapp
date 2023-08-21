@extends('layouts.pdf_portrait')
@section('title', '| Club Students')

@section('content')
<div class="container-fluid box"> 
    <h1 class="title"><u>{{$title}}</u></h1> 
    <div>
    <table class="table table-bordered" id="table_style">
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>CLASS</b></td>
                <td><b>PHONE NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($clubStudents))
            @forelse($clubStudents as $key=>$clubStudent)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $clubStudent->name}}</td>
                <td>{{ $clubStudent->stream->name}}</td>
                <td>{{ $clubStudent->phone_no}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Students notyet assigned to {{$club->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>           
@endsection
