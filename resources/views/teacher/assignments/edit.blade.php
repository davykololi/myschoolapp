@extends('layouts.teacher')
@section('title', '| Teacher Edit Assignment')

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit <a href="{{ route('teacher.assignments.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('teacher.assignments.update', $assignment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Assignment Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $assignment->name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date Given</label>
                        <div class="relative w-full md:w-[220px]" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="date_given" id="date_given" class="py-1 bg-gray-200 focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" value="{{ $assignment->date_given }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Deadline</label>
                        <div class="relative w-full md:w-[220px]" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="deadline" id="deadline" class="py-1 bg-gray-200 focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" value="{{ $assignment->deadline }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" id="file" class="form-control" value="{{ $assignment->file }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Select Class</label>
                        <div class="col-sm-10">
                            @include('ext._attach_streamdiv')
                        </div>
                    </div>
                    @include('ext._attach_studentdiv')
                    @include('ext._attach_subordinatediv')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
