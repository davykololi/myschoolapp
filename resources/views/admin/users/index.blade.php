@extends('layouts.admin')
@section('title', '| All Users')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($users))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>USERS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('users.create')}}"> Add User</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    @include('partials.userhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="table-text">
                                <div>{{$user->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->role}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$user->created_at}}</div>
                            </td>
                            <td>
                                

                                <form action="{{url('users',$user->id)}}" method="POST">
                                    {{method_field('DELETE')}}
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{ route('users.show', $user->id) }}" class="label label-success">Details</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="label label-warning">Edit</a>
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" value="Delete">
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
