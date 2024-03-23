@extends('layouts.admin')
@section('title', '| Add Meeting')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            @include('partials.errors')
            <div class="card-header">
                <h5 class="card-title">CREATE A MEETING</h5>
                <a href="{{ route('admin.meetings.index') }}" class="btn btn-primary pull-right">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.meetings.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Meeting Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date</label>
                        <div class="relative w-full md:w-1/4 lg:w-1/4" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                            <input type="text" name="date" id="date" class="form-input-one" placeholder="Meeting Date">
                            @error('date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Venue</label>
                        <div class="col-sm-10">
                            <input type="text" name="venue" id="venue" class="form-control" placeholder="Meeting Venue">
                            @error('venue')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Agenda</label>
                        <div class="col-sm-10">
                            <input type="text" name="agenda" id="agenda" class="form-control" placeholder="Meeting Agenda">
                            @error('agenda')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Starts At</label>
                        <div class="relative mb-3 w-full md:w-1/4 lg:w-1/4" data-te-date-timepicker-init data-te-input-wrapper-init>
                            <input type="text" name="start_at" id="start_at" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="form9"  placeholder="Starting Time">
                            <label for="form9" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"> 
                                Select a time
                            </label>

                            @error('start_at')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Ends At</label>
                        <div class="relative mb-3 w-full md:w-1/4 lg:w-1/4" data-te-date-timepicker-init data-te-input-wrapper-init>
                            <input type="text" name="end_at" id="end_at" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="form9"  placeholder="Ending Time">
                            <label for="form9" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"> 
                                Select a time
                            </label>
                            @error('end_at')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="teachers">{{__('Attach Teachers')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_teacherdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="students">{{__('Attach Students')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_studentdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="staffs">{{ __('Attach Subordinate Staffs') }}<span class="text-[red]">**</span></label>
                                @include('ext._attach_subordinatediv')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="streams">{{__('Attach Streams')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label class="uppercase mb-2" for="clubs">{{__('Attach Clubs')}}<span class="text-[red]">**</span></label>
                                @include('ext._attach_clubdiv')
                            </div>
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
