@extends('layouts.admin')
@section('title', '| All Teachers')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($teachers))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TEACHERS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.teachers.create')}}"> Add Teacher</a>
                    <a href="{{route('admin.school.teachers', Auth::user()->school->id)}}" class="btn btn-primary btn-border">
                        Teachers Pdf
                    </a>
                    <a href="{{route('admin.export.shool_teachers')}}" class="btn btn-primary btn-border">Teachers Excel</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.teacherhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($teachers as $key => $teacher)
                        <tr>
                            <td class="table-text">
                                <div>{{$teacher->title}} {{$teacher->full_name}}</div>
                            </td>
                            </td>
                            <td class="table-text">
                                <div>{{$teacher->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$teacher->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$teacher->emp_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$teacher->position_teacher->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$teacher->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.teachers.destroy',$teacher->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
