@extends('layouts.admin')
@section('title', '| Farm Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryFarms))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>FARMS CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.category-farms.create')}}"> Create Farm Category</a>
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
                    @foreach($categoryFarms as $key => $categoryFarm)
                        <tr>
                            <td class="table-text">
                                <div>{{$categoryFarm->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryFarm->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryFarm->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.category-farms.destroy',$categoryFarm->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.category-farms.show',$categoryFarm->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('admin.category-farms.edit',$categoryFarm->id)}}" class="btn btn-warning btn-xs">   Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categoryFarm->name}}?')">
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
