@extends('layouts.admin')
@section('title', '| Game Categories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($categoryGames))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>GAME CATEGORIES</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.category-games.create')}}">Create</a>
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
                    @foreach($categoryGames as $key => $categoryGame)
                        <tr>
                            <td class="table-text">
                                <div>{{$categoryGame->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryGame->desc}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$categoryGame->slug}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.category-games.destroy',$categoryGame->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('admin.category-games.show',$categoryGame->id)}}" class="btn btn-success btn-xs">Details
                                    </a>
                                    <a href="{{route('admin.category-games.edit',$categoryGame->id)}}" class="btn btn-warning btn-xs">   Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$categoryGame->name}}?')">
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
