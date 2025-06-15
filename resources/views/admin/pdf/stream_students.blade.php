@extends('layouts.pdf_portrait')
@section('title', '| Stream Students')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <p>
        <span style="margin-left: 10px;margin-right: 10px;"><b>Total:</b> <i class="dotted-underline">
            {{ $stream->students->count() }} Students;</i>
        </span>
        <span style="margin-left: 10px;margin-right: 10px;" class="dotted-underline">
            @if($males > 1)
             {{ $males }} <i>Males</i>
            @else
             {{ $males }} <i>Male</i>
            @endif
        </span>
        <span style="margin-left: 10px;margin-right: 10px;" class="dotted-underline">
            @if($females > 1)
             {{ $females }} <i>Females</i>
            @else
             {{ $females }} <i>Female</i>
            @endif
        </span>
    </p> 
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>GDR</b></td>
                <td><b>ADM NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamStudents))
            @forelse($streamStudents as $key => $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->user->full_name}}</td>
                @if($value->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($value->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td>{{ $value->admission_no}}</td>
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