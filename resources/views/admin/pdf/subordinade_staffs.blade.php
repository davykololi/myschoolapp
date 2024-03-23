@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Subordinate Staffs')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-landscape-current-date/></div>
    <h2 class="title"><u>{{$title}}</u></h2>
    <div>
    <table>
        <thead>
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
                <td><b>POSITION</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolSubStaffs))
            @forelse($schoolSubStaffs as $subStaff)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subStaff->user->salutation }} {{ $subStaff->user->full_name }}</td>
                <td>{{ $subStaff->phone_no }}</td>
                <td>{{ $subStaff->user->email }}</td>
                <td>{{ $subStaff->position->value }}</td>
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
