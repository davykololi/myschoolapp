@extends('layouts.admin')
@section('title', '| Students Roles')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($positionStudents))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>STUDENTS ROLES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.position-students.create')}}">Create</a>
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
                    @foreach($positionStudents as $key => $positionStudent)
                        <tr>
                            <td class="table-text">
                                <div>{{$positionStudent->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionStudent->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionStudent->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.position-students.destroy',$positionStudent->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.position-students.show',$positionStudent->id)}}" class="btn btn-success btn-xs">    Details
                                    </a>
                                    <a href="{{route('admin.position-students.edit',$positionStudent->id)}}" class="btn btn-warning btn-xs">    Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$positionStudent->name}}?')">
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
