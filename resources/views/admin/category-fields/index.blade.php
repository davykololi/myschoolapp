@extends('layouts.admin')
@section('title', '| Field Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryFields))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>FIELDS CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.category-fields.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="25%">NAME</th>
                        <th width="30%">DESCRIPTION</th>
                        <th width="20%">SLUG</th>
                        <th width="25%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($categoryFields as $key => $categoryField)
                        <tr>
                            <td class="table-text">
                                <div>{{$categoryField->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryField->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryField->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.category-fields.destroy',$categoryField->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.category-fields.show',$categoryField->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('admin.category-fields.edit',$categoryField->id)}}" class="btn btn-warning btn-xs">   Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categoryField->name}}?')">
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
