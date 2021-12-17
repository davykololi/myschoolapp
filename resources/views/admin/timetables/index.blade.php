@extends('layouts.admin')
@section('title', '| All Timetables')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($timetables))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TIMETABLES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.timetables.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.timetabletbhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($timetables as $timetable)
                        <tr>
                            <td class="table-text">
                                <div>
                                    <a href="{{route('admin.timetable.download',$timetable->id)}}" class="btn btn-outline-warning">
                                        Download
                                    </a>
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{$timetable->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$timetable->school->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$timetable->stream->class->name}} {{$timetable->stream->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.timetables.destroy',$timetable->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.timetables.show', $timetable->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.timetables.edit', $timetable->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$timetable->desc}}?')">
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
