@extends('layouts.superadmin')
@section('title', '| Accountant Roles')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($positionAccountants))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ACCOUNTANT ROLES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.position-accountants.create')}}"> Create Accountant Role</a>
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
                    @foreach($positionAccountants as $key => $positionAccountant)
                        <tr>
                            <td class="table-text">
                                <div>{{$positionAccountant->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionAccountant->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$positionAccountant->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.position-accountants.destroy',$positionAccountant->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.position-accountants.show',$positionAccountant->id)}}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{route('superadmin.position-accountants.edit',$positionAccountant->id)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$positionAccountant->name}}?')">
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
