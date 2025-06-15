@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| School Parents')

@section('content')
<div class="container"> 
    <div class="mt"><x-pdf-landscape-current-date/></div>
    <div>
    <h2 class="title" style="margin-top: -25px"><u>{{ $title }}</u></h2>
    <p style="margin-left: -80px;"><u><b>Total:</b> {{ $schoolParents->count() }} <i>Parents</i></u></p>
    <div>
    <table>
        <thead class="table-bordered">
            <tr>
                <td><b>NO</b></td>
                <td><b>NAME</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>C.POSTAL ADDRESS</b></td>
                <td><b>P.POSTAL ADDRESS</b></td>
                <td><b>EMAIL ADDRESS</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($schoolParents))
            @forelse($schoolParents as $schoolParent)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td class="table-left">{{ $schoolParent->user->salutation }} {{ $schoolParent->user->full_name }}</td>
                <td class="table-left">{{ $schoolParent->phone_no }}</td>
                <td class="table-left">{{ $schoolParent->current_address }}</td>
                <td class="table-left">{{ $schoolParent->permanent_address }}</td>
                <td class="table-left blue">{{ $schoolParent->user->email }}</td>
            @empty
                <td colspan="10" style="color: red">
                    We are sorry!!. Parents notyet assigned to {{ $school->name }}.
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
