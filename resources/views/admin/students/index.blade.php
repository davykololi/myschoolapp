@extends('layouts.admin')
@section('title', '| All Students')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($students))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>STUDENTS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.students.create')}}">Create</a>
                    <a href="{{route('admin.export.students')}}" class="btn btn-primary btn-border">Students Excel</a> 
                    <a href="{{route('admin.school.students', Auth::user()->school->id)}}" class="btn btn-primary btn-border">Students PDF</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.studenthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="table-text">
                                <div>{{$student->title}} {{$student->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$student->admission_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$student->stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$student->phone_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$student->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$student->position_student->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.students.destroy',$student->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
