@extends('layouts.admin')
@section('title', '| All Subordnade Staffs')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($staffs))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SUBSTAFF LIST</h2>
                </div>
                <div class="pull-right">
                    <a href="{{route('admin.school.staffs', Auth::user()->school->id)}}" class="btn btn-primary btn-border">
                        Sub Staff Pdf
                    </a>
                    <a class="btn btn-success" href="{{route('admin.staffs.create')}}"> Add Sub Staff</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.staffhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td class="table-text">
                                <div>{{$staff->title}} {{$staff->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$staff->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$staff->emp_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$staff->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$staff->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.staffs.destroy',$staff->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.staffs.show', $staff->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.staffs.edit', $staff->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$staff->full_name}}?')">
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
