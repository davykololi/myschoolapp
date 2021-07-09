@extends('layouts.admin')
@section('title', '| Class Subjects')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($subs))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CLASS SUBJECTS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.subs.create')}}">Create</a>
                    <br/><br/>
                    <a href="{{route('admin.stream.facilitators')}}" class="btn btn-primary btn-border">Class Facitators PDF</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.class_subjecthead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($subs as $key => $sub)
                        <tr>
                            <td class="table-text">
                                <div>{{$sub->teacher->title}} {{$sub->teacher->full_name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$sub->stream->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$sub->subject->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.subs.destroy',$sub->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.subs.show', $sub->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.subs.edit', $sub->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$sub->name}}?')">
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
