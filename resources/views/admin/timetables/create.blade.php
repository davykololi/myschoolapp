@extends('layouts.admin')
@section('title', '| Add Timetable')

@section('content')
@role('admin')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <h1 class="front-h1 my-4">ADD TIMETABLE</h1>
            <div style="float: right;" class="mb-8">
                <x-button class="back-button">
                    <x-back-svg-n-url> <a href="{{ route('admin.timetables.index') }}">Back</a></x-back-svg-n-url>
                </x-button>
            </div>
            <div class="mt-12">
                <form action="{{ route('admin.timetables.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="flex flex-col md:flex-row lg:flex-row gap-4">
                        <div class="w-full md:w-1/2 lg:w-1/2 mb-4">
                            <label class="" >Upload Timetable</label>
                            <div class="w-full block">
                                <input type="file" name="file" id="file" class="form-input-one-photo-upload py-0 w-fit" placeholder="Upload Timetable">
                                @error('file')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2 mb-2">
                            <label class="" >Description</label>
                            <div class="w-full block">
                                <input type="text" name="desc" id="desc" class="form-control" placeholder="Timetable description">
                                @error('desc')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h4 class="my-4">NOTE: SELECT THE APPROPRIATE TIMETABLE SECTION</h4>
                    <div class="flex flex-col md:flex-row lg:flex-row gap-4">
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Stream</label>
                            <div class="w-full block">
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Class</label>
                            <div class="w-full block">
                                @include('ext._attach_classdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Exam</label>
                            <div class="w-full block">
                                @include('ext._get_exams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 mb-2">
                            <label class="" >Select Teacher</label>
                            <div class="w-full block">
                                @include('ext._get_teachers_ids')
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
@endrole
@endsection
