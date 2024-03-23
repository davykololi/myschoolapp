@extends('layouts.pdf_landscape_A4_plain')
@section('title', '| Stream Teachers')

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
                <td><b>SUBJECT</b></td>
                <td><b>PHONE NO</b></td>
                <td><b>EMAIL</b></td>
            </tr>
        </thead>
        <tbody>
            @if(!empty($streamSubjects))
            @forelse($streamSubjects as $streamSubject)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $streamSubject->teacher->user->salutation}} {{ $streamSubject->teacher->user->full_name}}</td>
                <td>{{ $streamSubject->subject->name}}</td>
                <td>{{ $streamSubject->teacher->phone_no}}</td>
                <td>{{ $streamSubject->teacher->user->email}}</td>
            @empty
                <td colspan="10" style="color: red">
                    Teachers notyet assigned to {{$stream->name}}.
                </td>
            </tr>
            @endforelse
            @endif
        </tbody>
    </table> 
    </div>
</div        
@endsection
