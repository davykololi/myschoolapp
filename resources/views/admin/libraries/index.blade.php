@extends('layouts.admin')
@section('title', '| All Libraries')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($libraries))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LIBRARIES LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.libraries.create')}}"> Add Library</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.libraryhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($libraries as $library)
                        <tr>
                            <td class="table-text">
                                <div>{{$library->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$library->code}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$library->phone_no}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.libraries.destroy',$library->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.libraries.show', $library->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.libraries.edit', $library->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$library->name}}?')">
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
