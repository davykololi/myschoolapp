@extends('layouts.pdf_A4plain_portrait')
@section('title', '| School Clubs')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-lg-12">
            <x-pdf-portrait-current-date/>
            <div><h2 class="title"><u>{{$title}}</u></h2></div>
            <div>    
                <table>
                    <thead>
                        <tr>
                            <td><b>NO</b></td>
                            <td><b>NAME</b></td>
                            <td><b>REG DATE</b></td>
                            <td><b>TEACHERS</b></td>
                            <td><b>STUDENTS</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($schoolClubs))
                        @forelse($schoolClubs as $key=>$club)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $club->name }}</td>
                            <td>{{ $club->regDate() }}</td>
                            <td>{{ $club->teachers->count() }}</td>
                            <td>{{ $club->students->count() }}</td>
                        @empty
                            <td colspan="10" style="color: red">
                                No club(s) have been registered in {{$school->name}}.
                            </td>
                        </tr>
                         @endforelse
                         @endif
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>        
@endsection
