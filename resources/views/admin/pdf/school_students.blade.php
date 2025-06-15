@extends('layouts.pdf_A4plain_portrait')
@section('title', '| School Students')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <div>
    <div><h2 class="title"><u>{{ $title }}</u></h2></div>
    <div style="font-family: Harrington;margin-bottom: 10px;">
        <b>Total:</b> 
        <span class="dotted-underline">{{ $students->count() }} <i>Students</i> -
            @if($maleStudents > 1)
             {{ $maleStudents }} <i>Males</i>
            @else
             {{ $maleStudents }} <i>Male</i>
            @endif
        
            @if($femaleStudents > 1)
             {{ $femaleStudents }} <i>Females</i>
            @else
             {{ $femaleStudents }} <i>Female</i>
            @endif
        </span>
    </div>
    <div>
    <table>
        <thead>
            <tr>
                <td width="7%"><b>NO</b></td>
                <td width="40%"><b>NAME</b></td>
                <td width="5%"><b>GDR</b></td>
                <td width="23%"><b>CLASS</b></td>
                <td width="25%"><b>ADMISSION NO</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($students))
            @forelse($students as $student)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left">{{ $student->user->full_name }}</td>
                @if($student->user->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($student->user->gender === "Female")
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
