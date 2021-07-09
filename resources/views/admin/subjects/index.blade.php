@extends('layouts.admin')
@section('title', '| All Subjects')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($subjects))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SUBJECT LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.subjects.create')}}"> Add Subject</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.subjecthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($subjects as $key => $subject)
                        <tr>
                            <td class="table-text">
                                <div>{{$subject->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$subject->category_subject->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$subject->department->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.subjects.destroy',$subject->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.subjects.show', $subject->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$subject->name}}?')">
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
