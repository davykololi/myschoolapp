@extends('layouts.superadmin')
@section('title', '| Edit Class')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
            <div class="panel-heading">
                Edit Class<a href="{{ url()->previous() }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('superadmin.classes.update',$class->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" id="desc" class="form-control" value="{{ $class->desc }}">
                        </div>
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
  </x-backend-main>
@endsection







