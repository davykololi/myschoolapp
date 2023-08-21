@extends('layouts.pdf_A4plain_portrait')
@section('title', '| School Students')

@section('content')
<div class="container"> 
    <div class="row">
    <h2 class="title" style="margin-top: -25px"><u>{{ $title }}</u></h2>
    <h3>
        <span style="margin-left: 10px;margin-right: 10px;"><b>Total:</b> {{ $students->count() }} <i>Students</i></span>
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
            <tr style="background-color: black;color: white;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>GENDER</b></td>
                <td><b>CLASS</b></td>
                <td><b>ADM NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($students))
            @forelse($students as $student)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left" style="text-transform: uppercase;">{{ $student->full_name }}</td>
                @if($student->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($student->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td class="table-left" style="text-transform: uppercase;">{{ $student->stream->name }}</td>
                <td class="table-left">{{ $student->admission_no }}</td>
            @empty
                <td colspan="10" style="color: red">
                    We are sorry!!. Students have not been admitted to {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table> 
    </div>
    </div>
</div>            
@endsection
