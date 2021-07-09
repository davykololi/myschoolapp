@extends('layouts.superadmin')
@section('title', '| Teachers Roles')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($positionTeachers))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TEACHERS ROLES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.position-teachers.create')}}"> Create Teacher Role</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="25%">DESCRIPTION</th>
                        <th width="25%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($positionTeachers as $key => $positionTeacher)
                        <tr>
                            <td class="table-text">
                                <div>{{$positionTeacher->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionTeacher->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionTeacher->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.position-teachers.destroy',$positionTeacher->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.position-teachers.show',$positionTeacher->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('superadmin.position-teachers.edit',$positionTeacher->id)}}" class="btn btn-warning btn-xs">Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$positionTeacher->name}}?')">
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
