@extends('layouts.pdf_A4plain_portrait')
@section('title', '| Stream Subjects')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-lg-12">
            <div class="mt"><x-pdf-portrait-current-date/></div>
            <div><h2 class="title"><u>{{$title}}</u></h2></div>
            <div>    
                <table>
                    <thead>
                        <tr>
                            <td><b>NO</b></td>
                            <td><b>SUBJECT</b></td>
                            <td><b>CATEGORY</b></td>
                            <td><b>CODE</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($streamSubjects))
                        @forelse($streamSubjects as $key=>$streamSubject)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $streamSubject->name }}</td>
                            <td>{{ $streamSubject->type }}</td>
                            <td>{{ $streamSubject->code }}</td>
                        @empty
                            <td colspan="10" style="color: red">
                                No subjects(s) assigned to {{$stream->name}}.
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
