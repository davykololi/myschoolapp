@extends('layouts.pdf_portrait')
@section('title', '| Class Students')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <h3>
        <span style="margin-left: 10px;margin-right: 10px;"><b>Total:</b> {{ $class->students->count() }} <i>Students</i></span>
        <span style="margin-left: 10px;margin-right: 10px;">
            @if($males > 1)
             {{ $males }} <i>Males</i>
            @else
             {{ $males }} <i>Male</i>
            @endif
        </span>
        <span style="margin-left: 10px;margin-right: 10px;">
            @if($females > 1)
             {{ $females }} <i>Females</i>
            @else
             {{ $females }} <i>Female</i>
            @endif
        </span>
    </h3> 
    <div>
    <table>
        <thead>
            <tr>
                <td width="5%"><b>NO</b></td>
                <td width="45%"><b>NAME</b></td>
                <td width="5%"><b>GDR</b></td>
                <td width="30%"><b>ADM NO</b></td>
                <td width="15%"><b>STREAM</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($classStudents))
            @forelse($classStudents as $key => $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->user->full_name}}</td>
                @if($value->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($value->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td>{{ $value->admission_no}}</td>
                <td>{{ $value->stream->stream_section->name}}</td>
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