@extends('layouts.pdf_A4plain_portrait')
@section('title', '| Club Students')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <x-pdf-portrait-current-date/>
            <h2 class="title"><u>{{$title}}</u></h2> 
            <div>
                <table>
                    <thead>
                        <tr>
                            <td><b>NO</b></td>
                            <td><b>NAME</b></td>
                            <td><b>ADM NO</b></td>
                            <td><b>STREAM</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($clubStudents))
                        @forelse($clubStudents as $key=>$clubStudent)
                        <tr>
                            <td class="text-left">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $clubStudent->full_name }}</td>
                            <td class="text-left">{{ $clubStudent->admission_no }}</td>
                            <td class="text-left">{{ $clubStudent->stream->name }}</td>
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
    </div>
</div>           
@endsection
