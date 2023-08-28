@extends('layouts.pdf_A4plain_portrait')
@section('title', '| Club Students')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="title" style="margin-top: -60px;"><u>{{$title}}</u></h2> 
            <div>
                <table>
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
                            <td style="text-transform: uppercase;">{{ $clubStudent->full_name}}</td>
                            <td style="text-transform: uppercase;">{{ $clubStudent->stream->name}}</td>
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
    </div>
</div>           
@endsection
