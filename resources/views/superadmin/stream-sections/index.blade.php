@extends('layouts.superadmin')
@section('title', '| Stream Sections')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($streamSections))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>STREAM SECTIONS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.stream-sections.create')}}">Create</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-bordered-bd-warning mt-4"">
                    <!-- Table Headings -->
                    <thead>
                        <th width="30%">NAME</th>
                        <th width="45%">DESCRIPTION</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($streamSections as $key => $streamSection)
                        <tr>
                            <td class="table-text">
                                <div>{{$streamSection->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$streamSection->desc}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.stream-sections.destroy',$streamSection->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('superadmin.stream-sections.show',$streamSection->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('superadmin.stream-sections.edit',$streamSection->id)}}" class="btn btn-warning btn-xs">Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$streamSection->name}}?')">
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
