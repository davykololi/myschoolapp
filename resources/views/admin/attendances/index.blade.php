@extends('layouts.admin')
@section('title', '| All Attendances')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($attendances))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ATTENDANCE LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.attendances.create')}}"> Add An Attendance</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.attendancehead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td class="table-text">
                                <div>{{$attendance->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$attendance->date}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$attendance->time}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.attendances',$attendance->id)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{ route('admin.attendances.show', $attendance->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('admin.attendances.edit', $attendance->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
