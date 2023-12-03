@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Departments')

@section('content')
    <table>
        <caption class="table_caption">
            <h2 class="title" style="margin-top: -20px"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td class="top-bottom-pad left"><b>NO</b></td>
                <td class="top-bottom-pad left"><b>NAME</b></td>
                <td class="top-bottom-pad left"><b>PHONE NO</b></td>
                <td class="top-bottom-pad left"><b>HEAD</b></td>
                <td class="top-bottom-pad left"><b>ASSISTANT</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolDepts))
            @forelse($schoolDepts as $key=>$schoolDept)
            <tr>
                <td class="left">{{ $loop->iteration}}</td>
                <td class="left">{{ $schoolDept->name}}</td>
                <td class="left">{{ $schoolDept->phone_no}}</td>
                <td class="left">{{ $schoolDept->head_name}}</td>
                <td class="left">{{ $schoolDept->asshead_name}}</td>
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
