@extends('layouts.pdf_portrait')
@section('title', '| School Clubs')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-lg-12">
            <div><h1 class="title"><u>{{$title}}</u></h1></div>
            <div>    
                <table class="table table-bordered" id="table_style">
                    <thead>
                        <tr>
                            <td><b>NO</b></td>
                            <td><b>NAME</b></td>
                            <td><b>REG DATE</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($clubs))
                        @forelse($clubs as $key=>$club)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $club->name}}</td>
                            <td>{{ $club->regDate()}}</td>
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
