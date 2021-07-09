@extends('layouts.admin')
@section('title', '| Class Streams')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($streams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>STREAMS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.streams.create')}}">Create Stream</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.streamhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($streams as $stream)
                        <tr>
                            <td class="table-text">
                                <div>{{$stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$stream->stream_section->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.streams.destroy',$stream->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.streams.show',$stream->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.streams.edit',$stream->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
