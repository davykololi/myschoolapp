@extends('layouts.superadmin')
@section('title', '| Edit Accountant')

@section('content')
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div>
            <h1 class="text-center uppercase font-bold text-2xl underline">Edit Accountant</h1>
            <x-back-button/>
            <div class="px-4 border-2 mt-8 py-8">
                <form action="{{ route('superadmin.accountants.update', $accountant->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Salutation</label>
                            <div class="flex flex-col">
                                <input type="text" name="salutation" id="salutation" class="form-control" value="{{ $accountant->salutation }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >First Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $accountant->first_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Middle Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $accountant->middle_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Last Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $accountant->last_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Gender Status</label>
                            <div class="flex flex-col">
                                <input type="text" name="gender" id="gender" class="form-control" value="{{ $accountant->gender }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Image</label>
                            <div class="flex flex-col">
                                <input type="file" name="image" id="image" class="form-control" value="{{ $accountant->image }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Blood Group</label>
                            <div class="flex flex-col">
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >DOB</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" id="dob" class="" value="{{ $accountant->dob }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Email</label>
                            <div class="flex flex-col">
                                <input type="text" name="email" id="email" class="form-control" value="{{ $accountant->email }}">
                            </div>
                        </div> 
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >ID NO.</label>
                            <div class="flex flex-col">
                                <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $accountant->id_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Phone No.</label>
                            <div class="flex flex-col">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $accountant->phone_no }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Emp. No.</label>
                            <div class="flex flex-col">
                                <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ $accountant->emp_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Designation</label>
                            <div class="flex flex-col">
                                <input type="text" name="designation" id="designation" class="form-control" value="{{ $accountant->designation }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Postal Address</label>
                            <div class="flex flex-col">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $accountant->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="" >Role</label>
                            <div class="flex flex-col">
                                @include('ext._attach_accountant_rolediv')
                            </div>
                        </div>
                    </div>
                        
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">   
                        <div class="w-full">
                            <label class="control-label col-sm-2" >History</label>
                            <div class="flex flex-col">
                                <textarea class="form-control" id="summary-ckeditor" name="history">{!! $accountant->history !!}</textarea>
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
