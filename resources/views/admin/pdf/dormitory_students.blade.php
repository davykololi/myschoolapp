@extends('layouts.pdf_portrait')
@section('title', '| Admin Dormitory Students')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <div><h2 class="title"><u>{{$title}}</u></h2></div>
    <p>
        <i style="margin-left: 7px;margin-right: 7px;color: midnightblue;">
            This dirmitory has a total of {{ $dormitory->students->count() }} students with a capacity of {{ $dormitory->bed_no }} beds. It's headed by {{ $dormitory->dom_head }} and assisted by {{ $dormitory->ass_head }}.
        </i>
    </p>
    <div>
    <table>
        <thead>
            <tr>
                <th class="left"><b>NO</b></th>
                <th class="left"><b>NAME</b></th>
                <th class="left"><b>ADM NO</b></th>
                <th class="left"><b>BED NO</b></th>
                <th class="left"><b>STREAM</b></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($dormitoryStudents))
            @forelse($dormitoryStudents as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->user->full_name }}</td>
                <td>{{ $student->admission_no }}</td>
                <td>
                    @if($student->bed_number != null)
                    {{ $student->bed_number->number }}
                    @else
                    {{ __('....................') }}
                    @endif
                </td>
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