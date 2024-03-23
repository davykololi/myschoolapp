@extends('layouts.admin')
@section('title', '| Edit User')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit User<a href="{{ route('users.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control" >
                                <option value="agent">Agent</option>
                                <option value="customer">Customer</option>
                                <option value="admin">Admin</option>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                    	<div class="col-md-6 offset-md-4">
                        	<button type="submit" class="btn btn-primary">
                            	Update
                            </button>
                    	</div>
                 	</div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
