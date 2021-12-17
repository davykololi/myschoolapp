@extends('layouts.superadmin')
@section('title', '| Blood Groups')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($bloodGroups))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>BLOOD GROUPS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.blood-groups.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">TYPE</th>
                        <th width="25%">DESCRIPTION</th>
                        <th width="25%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($bloodGroups as $key => $bloodGroup)
                        <tr>
                            <td class="table-text">
                                <div>{{$bloodGroup->type}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$bloodGroup->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$bloodGroup->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.blood-groups.destroy',$bloodGroup->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.blood-groups.show',$bloodGroup->id)}}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{route('superadmin.blood-groups.edit',$bloodGroup->id)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete blood group type {{$bloodGroup->type}}?')">
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
