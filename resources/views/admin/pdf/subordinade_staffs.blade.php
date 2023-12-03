@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Subordinade Staffs')

@section('content')
<div class="container"> 
    <h2 class="title"><u>{{$title}}</u></h2>
    <div>
    <table>
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
            @if(!empty($schoolSubStaffs))
            @forelse($schoolSubStaffs as $subStaff)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subStaff->salutation }} {{ $subStaff->full_name }}</td>
                <td>{{ $subStaff->phone_no }}</td>
                <td>{{ $subStaff->email }}</td>
                <td>{{ $subStaff->role }}</td>
            @empty
                <td colspan="10" style="color: red">
                    No subordinade stafs assigned to {{$school->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table>
    </div>
</div>        
@endsection
