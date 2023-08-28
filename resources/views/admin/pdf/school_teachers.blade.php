@extends('layouts.pdf_A4plain_portrait')
@section('title', '| School Teachers')

@section('content')
<div class="container"> 
    <div class="row">
    <h2 class="title" style="margin-top: -25px"><u>{{ $title }}</u></h2>
    <h3>
        <span style="margin-left: 10px;margin-right: 10px;"><b>Total:</b> {{ $teachers->count() }} <i>Teachers</i></span>
    </h3>
    <div>
    <table>
        <thead class="table-bordered">
            <tr style="background-color: black;color: white;">
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>GENDER</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($teachers))
            @forelse($teachers as $teacher)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left" style="text-transform: uppercase;">{{ $teacher->full_name }}</td>
                @if($teacher->gender === "Male")
                <td class="table-left">{{ __('M') }}</td>
                @elseif($teacher->gender === "Female")
                <td class="table-left">{{ __('F') }}</td>
                @endif
                <td class="table-left" style="text-transform: uppercase;">{{ $teacher->phone_no }}</td>
                <td class="table-left">{{ $teacher->email }}</td>
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
