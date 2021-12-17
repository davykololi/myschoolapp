@extends('layouts.admin')
@section('title', '| All Grading Grades')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($gradeSystems))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>GRADES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.grade-systems.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.gradesystemhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($gradeSystems as $gradeSystem)
                        <tr>
                            <td class="table-text">
                                <div>{{$gradeSystem->from_mark}}-{{$gradeSystem->to_mark}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->grade}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->points}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->year->year}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->class->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$gradeSystem->section->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.grade-systems.destroy',$gradeSystem->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.grade-systems.show', $gradeSystem->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('admin.grade-systems.edit', $gradeSystem->id) }}" class="btn btn-warning btn-xs">
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
