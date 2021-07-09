@extends('layouts.superadmin')
@section('title', '| All Librarians')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($librarians))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LIBRARIANS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.librarians.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    @include('partials.librarianhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($librarians as $librarian)
                        <tr>
                            <td class="table-text">
                                <div>{{$librarian->title}} {{$librarian->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$librarian->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$librarian->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$librarian->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.librarians.destroy',$librarian->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.librarians.show', $librarian->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('superadmin.librarians.edit', $librarian->id) }}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')">
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
