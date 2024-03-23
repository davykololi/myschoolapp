@extends('layouts.teacher')
@section('title', '| Teacher Give Assignment')

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
    <div class="max-w-screen mb-8">
        <div class="w-full">
            <div style="float:right;" class="mb-8 mx-8">
                <x-back-button/>
            </div>
            <div>
                <h5 class="text-center text-2xl font-bold">GIVE OUT ASSIGNMENT</h5>
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div class="md:p-4 md:mx-8 border border-white rounded my-4 h-full dark:border-slate-600 dark:text-slate-400">
                <form action="{{ route('teacher.assignments.store') }}" method="POST" class="p-2" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                <div class="w-full flex flex-col md:flex-row gap-2 md:ml-4">
                    <div class="py-2 w-full md:w-1/3">
                        <label>Assignment Name <span class="text-[red]">***</span></label>
                        <div class="w-full">
                            <input type="text" name="name" id="name" class="py-1 bg-gray-800 w-full md:w-[220px] focus:shadow-outline focus:bg-white focus:text-black focus:placeholder-blue-700 placeholder-white" value="{{ old('name') }}" placeholder="Assignment Name">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3">
                        <label >Date Given<span class="text-[red]">***</span></label>
                        <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="date_given" id="date_given" class="py-1 bg-gray-200 w-full md:w-[220px] focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Assignment Date">
                        </div>
                    </div>
                    <div class="py-2 w-full md:w-1/3">
                        <label>Deadline<span class="text-[red]">***</span></label>
                        <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="deadline" id="deadline" class="py-1 bg-gray-200 w-full md:w-[220px] focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Assignment Deadline">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row md:ml-4">
                    <div class="py-2 w-full md:w-1/2">
                        <label>Upload File<span class="text-[red]">***</span></label>
                        <div class="flex flex-col">
                            <input type="file" name="file" id="file" class="py-1 w-full md:w-1/3 focus:shadow-outline focus:bg-white focus:text-black focus:placeholder-blue-700 placeholder-white" value="{{ old('file') }}" placeholder="File">
                            @error('file')
                                <p class="text-[red] w-fit text-sm italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full p-4">
                    <h4 class="text-left font-bold uppercase w-full">
                        To 
                        <span class="italic capitalize">(Choose where necessary)</span>
                    </h4>
                    <div class="flex flex-col md:flex-row lg:flex-row gap-1">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="mb-4">
                                    <button class="multi-select-collapse-button" type="button" data-te-collapse-init data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample"aria-expanded="false" aria-controls="collapseExample">
                                    {{ __('Select Stream(s)') }}
                                    </button>
                                </label>
                                <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                                    <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-stone-500 dark:text-black">
                                        @include('ext._attach_streamdiv')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="mb-4">
                                    <button class="multi-select-collapse-button" type="button" data-te-collapse-init data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample"aria-expanded="false" aria-controls="collapseExample">
                                    {{ __('Select Student(s)') }}
                                    </button>
                                </label>
                                <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                                    <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-stone-500 dark:text-black">
                                       @include('ext._attach_studentdiv')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="mb-4">
                                    <button class="multi-select-collapse-button" type="button" data-te-collapse-init data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample"aria-expanded="false" aria-controls="collapseExample">
                                    {{ __('Select Sub Staff(s)') }}
                                    </button>
                                </label>
                                <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                                    <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-stone-500 dark:text-black">
                                       @include('ext._attach_subordinatediv')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3">
                        <div class="w-[70px] ml-4">
                            @include('ext._submit_create_button')
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>            
</x-frontend-main>
@endsection







