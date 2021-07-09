@extends('layouts.teacher')
@section('title', '| Teacher All Notes')

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
                    <a class="btn btn-success" href="{{route('teacher.notes.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.notes_tch_tbhead')
                    <!-- Table Body -->
                    <tbody>
                    @forelse($notes as $note)
                        <tr>
                            <td class="table-text">
                                <div>{{$note->teacher->title}} {{$note->teacher->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->subject->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->stream->class->name}} {{$note->stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$note->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <a href="{{route('teacher.notes.download',$note->id)}}" class="btn btn-outline-warning">Download</a>
                                </div>
                            </td>
                            <td>
                                <form action="{{route('teacher.notes.destroy',$note->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('teacher.notes.show', $note->id) }}" class="label label-success">Details</a>
                                    <a href="{{ route('teacher.notes.edit', $note->id) }}" class="label label-warning">Edit</a>
                                    <button type="submit" class="label label-danger" onclick="return confirm('Are you sure to delete?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            @empty
                            <td colspan="10">
                                <p style="color: red;text-transform: uppercase;">
                                    No Notes by {{ Auth::user()->title }} {{ Auth::user()->full_name }}
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
