@extends('layouts.pdf')
@section('title', '| School Subordinade Staffs')

@section('content')
    <table class="table table-bordered" id="table_style">
        <caption class="table_caption">
            <h2 class="title"><u>{{$title}}</u></h2>
        </caption>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
                <td><b>ROLE</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($subStaffs))
            @forelse($subStaffs as $subStaff)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subStaff->title }} {{ $subStaff->name }}</td>
                <td>{{ $subStaff->phone_no }}</td>
                <td>{{ $subStaff->email }}</td>
                <td>{{ $subStaff->position_staff->name }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No subordinade stafs assigned to {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>        
@endsection
