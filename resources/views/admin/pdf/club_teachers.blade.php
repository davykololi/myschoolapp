@extends('layouts.pdf_A4plain_portrait')
@section('title', '| Club Teachers')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <x-pdf-portrait-current-date/>
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
                        @if(!empty($clubTeachers))
                        @forelse($clubTeachers as $key=>$clubTeacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="text-transform: uppercase;">{{ $clubTeacher->full_name }}</td>
                            <td>{{ $clubTeacher->phone_no }}</td>
                            <td>{{ $clubTeacher->email }}</td>
                        @empty
                            <td colspan="10" style="color: red">
                                Teachers notyet assigned to {{$club->name}}.
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
