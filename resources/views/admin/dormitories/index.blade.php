@extends('layouts.admin')
@section('title', '| All Dormitories')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($dormitories))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>DORMITORY LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.dormitories.create')}}"> Add Dormitory</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.dormitoryhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($dormitories as $dormitory)
                        <tr>
                            <td class="table-text">
                                <div>{{$dormitory->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$dormitory->code}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$dormitory->bed_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$dormitory->dom_head}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.dormitories.destroy',$dormitory->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.dormitories.show', $dormitory->id) }}" class="btn btn-success btn-xs">
                                        Details
                                    </a>
                                    <a href="{{ route('admin.dormitories.edit', $dormitory->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$dormitory->name}}?')">
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
