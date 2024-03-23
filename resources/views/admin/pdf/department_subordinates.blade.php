@extends('layouts.pdf_A4plain_portrait')
@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-portrait-current-date/></div>
    <h2 class="title"><u>{{$title}}</u></h2>
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($deptSubordinates))
            @forelse($deptSubordinates as $deptSubordinate)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $deptSubordinate->user->salutation }} {{ $deptSubordinate->user->full_name}}</td>
                <td>{{ $deptSubordinate->phone_no}}</td>
                <td class="blue">{{ $deptSubordinate->user->email}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Subordinate Staffs notyet assigned to {{$department->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>           
@endsection