@extends('layouts.pdf_portrait')
@section('title', '| Dormitory Students')

@section('content')
<div class="container"> 
    <x-pdf-portrait-current-date/>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <h3>
        <span style="margin-left: 10px;margin-right: 10px;"><b>Total:</b> {{ $dormitory->students->count() }} <i>Students</i></span>
    </h3> 
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>ADM NO</b></td>
                <td><b>BED NO</b></td>
                <td><b>STREAM</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($dormitoryStudents))
            @forelse($dormitoryStudents as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->full_name}}</td>
                <td>{{ $student->admission_no}}</td>
                <td></td>
                <td>{{ $student->stream->name}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Students notyet assigned to {{$dormitory->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>               
@endsection