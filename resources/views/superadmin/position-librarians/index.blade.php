@extends('layouts.superadmin')
@section('title', '| Librarians Roles')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($positionLibrarians))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LIBRARIANS ROLES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.position-librarians.create')}}"> Create Librarian Role</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="25%">DESCRIPTION</th>
                        <th width="25%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($positionLibrarians as $key => $positionLibrarian)
                        <tr>
                            <td class="table-text">
                                <div>{{$positionLibrarian->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionLibrarian->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionLibrarian->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.position-librarians.destroy',$positionLibrarian->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.position-librarians.show',$positionLibrarian->id)}}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{route('superadmin.position-librarians.edit',$positionLibrarian->id)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$positionLibrarian->name}}?')">
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
