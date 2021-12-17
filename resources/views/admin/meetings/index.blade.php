@extends('layouts.admin')
@section('title', '| All Meetings')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($meetings))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MEETING LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.meetings.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.meetinghead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($meetings as $key => $meeting)
                        <tr>
                            <td class="table-text">
                                <div>{{$meeting->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($meeting->date)->format('d-m-Y')}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$meeting->venue}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$meeting->agenda}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.meetings.destroy',$meeting->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.meetings.show', $meeting->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.meetings.edit', $meeting->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$meeting->name}}?')">
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
