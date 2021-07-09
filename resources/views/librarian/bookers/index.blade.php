@extends('layouts.librarian')
@section('title', '| Issued Books')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    @include('partials.errors')
    <!-- Posts list -->
    @if(!empty($bookers))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ISSUED BOOKS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('librarian.bookers.create')}}">Create</a>
                    <a href="{{route('librarian.borrowed.excel')}}" class="btn btn-success">Issued Books Excel</a>
                    <a href="{{route('librarian.borrowed.pdf')}}" class="btn btn-success">Issued Books PDF</a>
                </div>
            </div>
            <form action="{{route('librarian.issuedbook.returnDate')}}" method="get" class="form-horizontal" style="margin-left: 40px">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Issued Date</label>
                    <input type="date" name="return_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Get</button>
            </form>
        </div>
        <br/><br/><hr style="border: solid grey 5px"/>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.issuedbookhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($bookers as $key => $booker)
                        <tr>
                            <td class="table-text">
                                <div>{{$booker->student->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$booker->book->title}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$booker->serial_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ \Carbon\Carbon::parse($booker->issued_date)->format('d-m-Y') }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ \Carbon\Carbon::parse($booker->return_date)->format('d-m-Y') }}</div>
                            </td>
                            <td class="table-text">
                                @if($booker->returned == 0)
                                <div><button class="label label-danger">{{$booker->returned ? 'YES':'NO'}}</button></div>
                                @else
                                <div><button class="label label-success">{{$booker->returned ? 'YES':'NO'}}</button></div>
                                @endif
                            </td>
                            <td class="table-text">
                                @if($booker->returned_status == 1)
                                <div><button class="label label-success">{{$booker->returned_status ? 'GOOD':'POOR'}}</button></div>
                                @else
                                <div><button class="label label-danger">{{$booker->returned_status ? 'GOOD':'POOR'}}</button></div>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('librarian.bookers.destroy',$booker->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('librarian.bookers.show', $booker->id) }}" class="label label-success">
                                        Details
                                    </a>
                                    <a href="{{ route('librarian.bookers.edit', $booker->id) }}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {{$booker->book->title}}?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
