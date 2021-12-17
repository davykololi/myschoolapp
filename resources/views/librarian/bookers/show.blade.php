@extends('layouts.librarian')
@section('title', '| Show Issued Book')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ISSUED BOOK DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('librarian.bookers.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $booker->book->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Serial No:</strong>
            {{ $booker->serial_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Author:</strong>
            {{ $booker->book->author }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Info:</strong>
            <b style="color: green">Name:</b> {{ $booker->student->full_name }} 
            <b style="color: green">Class:</b> {{ $booker->student->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Library</strong>
            {{ $booker->book->library->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Issued Date</strong>
            {{ \Carbon\Carbon::parse($booker->issued_date)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Return Date</strong>
            {{ \Carbon\Carbon::parse($booker->return_date)->format('d-m-Y') }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Returned ?:</strong>
            @if($booker->returned == 0)
                <div><button class="btn btn-danger">{{$booker->returned ? 'YES':'NO'}}</button></div>
            @else
                <div><button class="btn btn-success">{{$booker->returned ? 'YES':'NO'}}</button></div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Returned Status</strong>
            @if($booker->returned_status == 1)
                <div><button class="btn btn-success">{{$booker->returned_status ? 'GOOD':'POOR'}}</button></div>
            @else
                <div><button class="btn btn-danger">{{$booker->returned_status ? 'GOOD':'POOR'}}</button></div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Recommentation</strong>
            {{ $booker->recommentation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created</strong>
            {{ $booker->created_at }}
        </div>
    </div>
    <form action="{{ route('librarian.issuedbook.returned',$booker->id) }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10">
                <input type="radio" name="returned" id="returned" value="true"/>
                <button type="submit" class="btn btn-default">Book Returned</button>
            </div>
        </div>
    </form>
    <form action="{{ route('librarian.issuedbook.faulty',$booker->id) }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10">
                <input type="radio" name="returned_status" id="returned_status" value="false"/>
                <button type="submit" class="btn btn-default">Returned & Faulty</button>
            </div>
        </div>
    </form>
    <form action="{{ route('librarian.faultybook.cleared',$booker->id) }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-10">
                <input type="radio" name="returned_status" id="returned_status" value="true"/>
                <button type="submit" class="btn btn-default">Faulty Book Cleared</button>
            </div>
        </div>
    </form>
</div>
</main>
@endsection
