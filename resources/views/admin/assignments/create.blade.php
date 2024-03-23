@extends('layouts.admin')
@section('title', '| Add Assignment')

@section('content') 
@role('admin')
@can('academicRegistrar')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <h5 class="uppercase text-2xl font-semibold text-center">CREATE ASSIGNMENT</h5>
                <div class="mt-4 mb-8 w-full text-right px-4 md:px-2">
                <a href="{{ route('admin.assignments.index') }}" type="button" class="px-6 py-0.5 bg-blue-800 text-white rounded-md border-2 border-white md:hover:bg-blue-500 brightness-125">
                    Back
                </a>
                </div>
                @include('partials.errors')
                @include('partials.messages')
            </div>
            <div class="p-4 border rounded my-4 shadow-2xl mx-auto md:mx-8 lg:mx-8">
                <form action="{{ route('admin.assignments.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                <div class="w-full flex flex-col md:flex-row mb-4">
                    <div class="py-2 w-full md:w-1/3 mx-2 md:mx-8">
                        <label class="text-gray-700" >Assignment Name <span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="text" name="name" id="name" class="form-input" placeholder="Assignment Name">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3 mx-2 md:mx-8">
                        <label class="text-gray-700" >Date Given<span class="text-[red]">***</span></label>
                        <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="date_given" id="date_given" class="form-input" placeholder="Assignment Date">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3 mx-2 md:mx-8">
                        <label class="text-gray-700" >Deadline<span class="text-[red]">***</span></label>
                        <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="deadline" id="deadline" class="form-input" placeholder="Assignment Deadline">
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row mb-4">
                    <div class="py-2 w-full md:w-1/3 lg:w-1/3 mx-2 md:mx-8">
                        <label class="text-blue-700" >Upload File<span class="text-[red]">***</span></label>
                        <div class="md:mr-16 lg:mr-16">
                            <input type="file" name="file" id="file" class="w-full border rounded" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" placeholder="File" required>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-col md:flex-row md:gap-2">
                    <div class="py-2 w-full md:w-1/2 lg:w-1/2 border px-2 mt-4 mx-2 md:mx-8">
                        <h4 class="text-left font-bold uppercase w-full md:w-1/2">From</h4>
                        <div class="w-full">
                            @include('ext._attach_teacherdiv')
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/2 lg:w-1/2 border px-2 mt-4 mx-2 md:mx-8">
                        <h4 class="text-left font-bold uppercase w-full">
                            To 
                            <span class="italic capitalize">(Choose where necessary)</span>
                        </h4>
                        <div class="w-full md:border-green-800 md:p-4">
                            <div class="flex flex-col">
                                <label class="uppercase" for="stream">{{ __('Select Stream') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                            <div class="flex flex-col mt-4">
                                <label class="uppercase" for="student">{{ __('Select Student') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_studentdiv')
                            </div>
                            <div class="flex flex-col mt-4">
                                <label class="uppercase" for="staff">{{ __('Select Subordinate Staff') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_subordinatediv')
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3">
                        <div class="w-[70px] mx-2 md:mx-8">
                            @include('ext._submit_create_button')
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div> 
</div>           
</x-backend-main>
@endcan
@endrole
@endsection






