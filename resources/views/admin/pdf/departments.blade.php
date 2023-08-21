@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Departments')

@section('content')
    <table class="table table-bordered" width="80%">
        <caption class="table_caption">
            <h2 class="title" style="margin-top: -20px"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr style="background-color: black;color: white;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>HEAD</b></td>
                <td><b>ASSISTANT</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolDepts))
            @forelse($schoolDepts as $key=>$schoolDept)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td style="text-transform: uppercase;">{{ $schoolDept->name}}</td>
                <td>{{ $schoolDept->phone_no}}</td>
                <td style="text-transform: uppercase;">{{ $schoolDept->head_name}}</td>
                <td style="text-transform: uppercase;">{{ $schoolDept->asshead_name}}</td>
            @empty
                <td colspan="10" style="color: red">
                    No department(s) formed in {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>        
@endsection
