@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Teachers')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-landscape-current-date/></div>
    <div>
    <h2 class="title" style="margin-top: -25px"><u>{{ $title }}</u></h2>
    <p style="margin-left: -80px;"><u><b>Total:</b> {{ $schoolTeachers->count() }} <i>Teachers</i></u></p>
    <div>
    <table>
        <thead class="table-bordered">
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>GDR</b></td>
                <td><b>ROLE</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolTeachers))
            @forelse($schoolTeachers as $teacher)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left">{{ $teacher->user->salutation }} {{ $teacher->user->full_name }}</td>
                @if($teacher->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($teacher->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td class="table-left">{{ $teacher->position->value }}</td>
                <td class="table-left">{{ $teacher->phone_no }}</td>
                <td class="table-left blue">{{ $teacher->user->email }}</td>
            @empty
                <td colspan="10" style="color: red">
                    We are sorry!!. Teachers notyet assigned to {{$school->name}}.
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
