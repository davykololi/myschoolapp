@extends('layouts.admin')
@section('title', '| All Departments')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($departments))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>DEPARMENTS LIST</h2>
                </div>
                <div class="pull-right">
                    <a href="{{route('admin.school.depts', Auth::user()->school->id)}}" class="btn btn-primary btn-border">
                        Departments PDF
                    </a>
                    <br/><br/>
                    <a class="btn btn-success" href="{{route('admin.departments.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.departmenthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($departments as $key => $department)
                        <tr>
                            <td class="table-text">
                                <div>{{$department->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$department->phone_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$department->head_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$department->asshead_name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.departments.destroy',$department->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.departments.show', $department->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$department->name}}?')">
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
