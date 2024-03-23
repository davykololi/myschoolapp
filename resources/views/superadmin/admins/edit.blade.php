@extends('layouts.superadmin')
@section('title', '| Edit Admin')

@section('content')
<x-backend-main>
    <section class="max-w-full py-1 bg-blueGray-50">
        <div class="w-full px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0 dark:bg-stone-700 dark:text-slate-200">
                <div class="rounded-t bg-white mb-0 px-6 py-6 dark:bg-gray-200">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-800">
                            Edit Admin Details
                        </h6>
                        <x-back-button/>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-4 bg-gray-400 dark:bg-stone-500">
                    <form action="{{ route('superadmin.admins.update', $admin->id) }}" method="post" class="my-4" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                        <input type="hidden" name="_method" value="PUT">
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Personal Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Salutation</label>
                                <div class="flex flex-col">
                                    <input type="text" name="salutation" id="salutation" class="user-form-input" value="{{ $admin->user->salutation }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >First Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="first_name" id="first_name" class="user-form-input" value="{{ $admin->user->first_name }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Middle Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="middle_name" id="middle_name" class="user-form-input" value="{{ $admin->user->middle_name }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Last Name</label>
                                <div class="flex flex-col">
                                    <input type="text" name="last_name" id="last_name" class="user-form-input" value="{{ $admin->user->last_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >DOB</label>
                                <div class="flex flex-col">
                                    <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                        <input type="text" name="dob" id="dob" class="user-form-input" value="{{ $admin->dob }}">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <div class="flex flex-col">
                                    <select class="select user-form-input" id="gender" name="gender" data-fouc data-placeholder="Choose..">
                                        <option value=""></option>
                                        <option {{ (old('gender') == "Male") ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                        <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
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
                                <label class="control-label col-sm-2" >Upload Passport Photo:</label>
                                <div class="flex flex-col">
                                    <input type="file" name="image" id="image" class="user-form-input" value="{{ $admin->image }}">
                                    @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Identification Details
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >ID No</label>
                                <div class="flex flex-col">
                                    <input type="text" name="id_no" id="id_no" class="user-form-input" value="{{ $admin->id_no }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Emp. No.</label>
                                <div class="flex flex-col">
                                    <input type="text" name="emp_no" id="emp_no" class="user-form-input" value="{{ $admin->emp_no }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Designation</label>
                                <div class="flex flex-col">
                                    <input type="text" name="designation" id="designation" class="user-form-input" value="{{ $admin->designation }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Position</label>
                                <div class="flex flex-col">
                                    @include('ext._attach_admin_position')
                                </div>
                            </div> 
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Contact Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Current Postal Address</label>
                                <div class="flex flex-col">
                                    <input type="text" name="current_address" id="current_address" class="user-form-input" value="{{ $admin->current_address }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Permanent Postal Address</label>
                                <div class="flex flex-col">
                                    <input type="text" name="permanent_address" id="permanent_address" class="user-form-input" value="{{ $admin->permanent_address }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Email</label>
                                <div class="flex flex-col">
                                    <input type="text" name="email" id="email" class="user-form-input" value="{{ $admin->user->email }}">
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 lg:w-1/4">
                                <label class="control-label col-sm-2" >Phone Number</label>
                                <div class="flex flex-col">
                                    <input type="text" name="phone_no" id="phone_no" class="user-form-input" value="{{ $admin->phone_no }}">
                                </div>
                            </div> 
                        </div>

                        <hr class="mt-12 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            More Information
                        </h6>
                        <div class="w-full flex flex-col md:flex-row lg:flex-row mb-6 gap-2">
                            <div class="w-full">
                                <label class="control-label col-sm-2" >More Information</label>
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
    </section>
</x-backend-main> 
@endsection
