@extends('layouts.pdf_A4plain_portrait')
@section('title', '| School Students')

@section('content')
<div class="container"> 
    <x-pdf-portrait-current-date/>
    <div>
    <div><h2 class="title"><u>{{ $title }}</u></h2></div>
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
            <tr>
                <td width="10%"><b>NO</b></td>
                <td width="40%"><b>NAME</b></td>
                <td width="5%"><b>SEX</b></td>
                <td width="20%"><b>CLASS</b></td>
                <td width="25%"><b>ADM NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($students))
            @forelse($students as $student)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left">{{ $student->full_name }}</td>
                @if($student->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($student->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td class="table-left">{{ $student->stream->name }}</td>
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
