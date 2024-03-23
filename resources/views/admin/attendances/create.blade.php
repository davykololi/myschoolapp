@extends('layouts.admin')
@section('title', '| Admin Create Attendance ')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">CREATE ATTENDANCE</h5> 
                <a href="{{ route('admin.attendances.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attendances.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attendance Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Attendance Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Attendance Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" id="date" class="form-control" placeholder="Attendance Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Time</label>
                        <div class="col-sm-10">
                            <input type="datetime" name="time" id="time" class="form-control" placeholder="Attendance Time">
                        </div>
                    </div>
                        @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
