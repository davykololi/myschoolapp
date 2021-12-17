@extends('layouts.superadmin')
@section('title', '| All Admins')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($admins))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>ADMINS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('superadmin.admins.create')}}"> Add Admin</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered-bd-warning mt-4">
                    <!-- Table Headings -->
                    @include('partials.admintbhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td class="table-text">
                                <div>{{$admin->title}} {{$admin->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$admin->created_at}}</div>
                            </td>
                            <td>
                                <form action="{{route('superadmin.admins.destroy',$admin->id)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{ route('superadmin.admins.show', $admin->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('superadmin.admins.edit', $admin->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$admin->full_name}}?')">
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
