@extends('layouts.admin')
@section('title', '| All Assignments')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($assignments))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ASSIGNMENT LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.assignments.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.assignmenthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($assignments as $assignment)
                        <tr>
                            <td class="table-text">
                                <div>{{$assignment->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    @foreach($assignment->teachers as $teacher)
                                        {{$teacher->full_name}}
                                    @endforeach
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($assignment->date)->format('d-m-Y')}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($assignment->deadline)->format('d-m-Y')}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{route('admin.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                                        Download
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('admin.assignments.destroy',$assignment->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.assignments.show', $assignment->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('admin.assignments.edit', $assignment->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$assignment->name}}?')">
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
