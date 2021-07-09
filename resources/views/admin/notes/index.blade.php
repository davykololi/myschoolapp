@extends('layouts.admin')
@section('title', '| All Notes')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($notes))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>NOTES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.notes.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.notestbhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($notes as $note)
                        <tr>
                            <td class="table-text">
                                <div>{{$note->teacher->title}} {{$note->teacher->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->subject->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{route('admin.notes.download',$note->id)}}" class="btn btn-outline-warning">Download</a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('admin.notes.destroy',$note->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.notes.show', $note->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.notes.edit', $note->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
