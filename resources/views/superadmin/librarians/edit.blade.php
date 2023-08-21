@extends('layouts.superadmin')
@section('title', '| Edit Librarian')

@section('content')
<x-backend-main>
<div class="max-w-full p-4 md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h1 class="text-center text-2xl font-bold uppercase underline mb-4">Edit Librarian</h1>
            <x-back-button/>
            <div class="mt-8 border-2 px-4 py-4">
                <form action="{{ route('superadmin.librarians.update', $librarian->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Salutation</label>
                            <div class="flex flex-col">
                                <input type="text" name="salutation" id="salutation" class="form-control" value="{{ $librarian->salutation }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >First Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $librarian->first_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Middle Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $librarian->middle_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Last Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $librarian->last_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Image</label>
                            <div class="flex flex-col">
                                <input type="file" name="image" id="image" class="form-control" value="{{ $librarian->image }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >DOB</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="dob" id="dob" class="form-control" value="{{ $librarian->dob }}">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Blood Group</label>
                            <div class="flex flex-col">
                                @include('ext._attach_blood_group')
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Email</label>
                            <div class="flex flex-col">
                                <input type="text" name="email" id="email" class="form-control" value="{{ $librarian->email }}">
                            </div>
                        </div> 
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >ID NO.</label>
                            <div class="flex flex-col">
                                <input type="text" name="id_no" id="id_no" class="form-control" value="{{ $librarian->id_no }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Phone No.</label>
                            <div class="flex flex-col">
                                <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $librarian->phone_no }}" required>
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Emp. No.</label>
                            <div class="flex flex-col">
                                <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ $librarian->emp_no }}">
                            </div>
                        </div>
                    </div>
                     
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">   
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Designation</label>
                            <div class="flex flex-col">
                                <input type="text" name="designation" id="designation" class="form-control" value="{{ $librarian->designation }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Postal Address</label>
                            <div class="flex flex-col">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $librarian->address }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Role</label>
                            <div class="flex flex-col">
                                @include('ext._attach_librarian_role')
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mt-8 mb-4 gap-2">
                        <div class="w-full">
                            <label class="control-label col-sm-2" >More About Librarian</label>
                            <div class="flex flex-col">
                                <textarea class="form-control" id="summary-ckeditor" name="history">
                                    {!! $librarian->history !!}
                                </textarea>
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
