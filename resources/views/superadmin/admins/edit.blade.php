@extends('layouts.superadmin')
@section('title', '| Edit Admin')

@section('content')
<x-backend-main>
<div class="max-w-full p-8 md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h1 class="uppercase text-center text-2xl font-bold underline mb-4">Edit Admin</h1>
            <x-back-button/>
            <div class="mt-8 border-2 px-4">
                <form action="{{ route('superadmin.admins.update', $admin->id) }}" method="post" class="my-4" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Salutation</label>
                            <div class="flex flex-col">
                                <input type="text" name="salutation" id="salutation" class="form-control" value="{{ $admin->salutation }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >First Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $admin->first_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Middle Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $admin->middle_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Last Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $admin->last_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >DOB</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" id="dob" class="form-control" value="{{ $admin->dob }}">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label for="gender">Gender: <span class="text-danger">*</span></label>
                            <div class="flex flex-col">
                                <select class="select form-control" id="gender" name="gender" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ (old('gender') == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Blood Group</label>
                            <div class="flex flex-col">
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Image</label>
                            <div class="flex flex-col">
                                <input type="file" name="image" id="image" class="form-control" value="{{ $admin->image }}">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Email</label>
                            <div class="flex flex-col">
                                <input type="text" name="email" id="email" class="form-control" value="{{ $admin->email }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >ID No</label>
                            <div class="flex flex-col">
                                <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $admin->id_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Postal Address</label>
                            <div class="flex flex-col">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $admin->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Phone Number</label>
                            <div class="flex flex-col">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $admin->phone_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Emp. No.</label>
                            <div class="flex flex-col">
                                <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ $admin->emp_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Designation</label>
                            <div class="flex flex-col">
                                <input type="text" name="designation" id="designation" class="form-control" value="{{ $admin->designation }}">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Role</label>
                            <div class="flex flex-col">
                                @include('ext._attach_admin_role')
                            </div>
                        </div>        
                    </div>
                
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full">
                            <label class="control-label col-sm-2" >History</label>
                            <div class="flex flex-col">
                                <textarea class="form-control" id="summary-ckeditor" name="history">{!! $admin->history !!}</textarea>
                            </div>
                        </div>        
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
