@extends('layouts.admin')
@section('title', '| Sub Staffs Roles')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($positionStaffs))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SUB STAFF ROLES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.position-staffs.create')}}">Create</a>
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
                    @foreach($positionStaffs as $key => $positionStaff)
                        <tr>
                            <td class="table-text">
                                <div>{{$positionStaff->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionStaff->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionStaff->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.position-staffs.destroy',$positionStaff->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.position-staffs.show',$positionStaff->id)}}" class="btn btn-success btn-xs">    Details
                                    </a>
                                    <a href="{{route('admin.position-staffs.edit',$positionStaff->id)}}" class="btn btn-warning btn-xs">    Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$positionStaff->name}}?')">
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
