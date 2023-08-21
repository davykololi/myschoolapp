@extends('layouts.admin')
@section('title', '| All Parents')

@section('content')
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($myParents))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>PARENTS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.parents.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="20%">NAME</th>
                        <th width="20%">EMAIL</th>
                        <th width="20%">ID NO.</th>
                        <th width="20%">PHONE</th>
                        <th width="20%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($myParents as $parent)
                        <tr>
                            <td class="table-text">
                                <div>{{$parent->title}} {{$parent->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.parents.destroy',$parent->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.parents.show', $parent->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.parents.edit', $parent->id) }}" class="btn btn-warning btn-xs">Edit</a>
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
</x-backend-main>
@endsection
