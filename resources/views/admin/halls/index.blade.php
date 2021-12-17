@extends('layouts.admin')
@section('title', '| All Halls')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($halls))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>HALLS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.halls.create')}}">Create</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.hallhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($halls as $key => $hall)
                        <tr>
                            <td class="table-text">
                                <div>{{$hall->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$hall->code}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$hall->category_hall->name}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.halls.destroy',$hall->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.halls.show', $hall->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.halls.edit', $hall->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$hall->name}}?')">
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
