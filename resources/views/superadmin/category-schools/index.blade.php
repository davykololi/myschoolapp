@extends('layouts.superadmin')
@section('title', '| School Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categorySchools))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SCHOOL CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.category-schools.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-bordered-bd-warning mt-4"">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="35%">DESCRIPTION</th>
                        <th width="20%">SLUG</th>
                        <th width="20%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($categorySchools as $key => $categorySchool)
                        <tr>
                            <td class="table-text">
                                <div>{{$categorySchool->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categorySchool->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categorySchool->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.category-schools.destroy',$categorySchool->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.category-schools.show',$categorySchool->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('superadmin.category-schools.edit',$categorySchool->id)}}" class="btn btn-warning btn-xs">Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categorySchool->name}}?')">
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
