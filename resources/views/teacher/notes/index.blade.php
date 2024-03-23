<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($notes))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>MY NOTES </h2>
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
                    <tr>
                        <thead>
                            <th width="20%">CLASS</th>
                            <th width="20%">SUBJECT</th>
                            <th width="20%">TOPIC</th>
                            <th width="15%">FILE</th>
                            <th width="25%">ACTION</th>
                        </thead>
                    </tr>
                    <!-- Table Body -->
                    <tbody>
                    @forelse($notes as $note)
                        <tr>
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
                                    So far no notes given to any class.
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
</x-frontend-main>
</x-teacher>
