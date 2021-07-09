@extends('layouts.teacher')
@section('title', '| Teacher All Assignments')

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
                    <a class="btn btn-success" href="{{route('teacher.assignments.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.assignmenthead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($assignments as $assignment)
                        <tr>
                            <td class="table-text">
                                <div>{{$assignment->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    {{Auth::user()->full_name}}
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{ $assignment->getDate() }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $assignment->getDeadline() }}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{route('teacher.assignment.download',$assignment->id)}}" class="btn btn-outline-warning">
                                        Download
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('teacher.assignments.destroy',$assignment->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('teacher.assignments.show',$assignment->id) }}" class="label label-success">Details</a>
                                    <a href="{{ route('teacher.assignments.edit', $assignment->id) }}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete {{$assignment->name}}?')">
                                        Delete
                                    </button>
                                </form> 
                            </td>
                            @empty
                            <td colspan="10">
                                <p style="color: red;text-transform: uppercase;">
                                    No Assignments by {{ Auth::user()->title }} {{ Auth::user()->full_name }}
                                </p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</main>
@endsection
