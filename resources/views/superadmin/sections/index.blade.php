@extends('layouts.superadmin')
@section('title', '| Sections List')

@section('content')
@role('superadmin')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($sections))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>SECTIONS</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.sections.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="5"></th>
                        <th width="25%">NAME</th>
                        <th width="40%">DESCRIPTION</th>
                        <th width="30%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($sections as $key => $section)
                        <tr>
                            <td class="table-text">
                                <div>
                                    {{ $sections->perPage() * ($sections->currentPage() - 1) + $key + 1 }}
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{$section->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$section->description}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.sections.destroy',$section->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('superadmin.sections.show',$section->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.sections.edit',$section->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
@endrole
@endsection
