@extends('layouts.admin')
@section('title', '| Add Exam')

@section('content')
@role('admin')
@can('examRegistrar')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
        <div class="card">
            <div class="">
                <h2 class="admin-h2">Add An Exam</h2>
            </div>
            <x-back-button>
                <a href="{{ url()->previous() }}">Back</a>
            </x-back-button>
            <div class="text-center leading-tight font-hairline mt-8">
                @include('partials.errors')
            </div>
            <div class="px-4 border-2 mt-12 py-8">
                <form action="{{ route('admin.exams.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Exam Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="name" id="name" class="lib-form-input" placeholder="Exam Name">
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Start Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="start_date" id="start_date" class="lib-form-input" placeholder="Start Date">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >End Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="end_date" id="end_date" class="lib-form-input" placeholder="End Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Exam Category</label>
                            <div class="flex flex-col">
                                @include('ext._attach_exam_type')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Year</label>
                            <div class="flex flex-col">
                                @include('ext._attach_yeardiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Term</label>
                            <div class="flex flex-col">
                                @include('ext._get_term_id')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Streams</label>
                            <div class="flex flex-col">
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Subjects</label>
                            <div class="flex flex-col">
                                @include('ext._attach_subjectdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Status</label>
                            <div class="flex flex-col">
                                @include('ext._attach_exam_status')
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
@endcan
@endrole
@endsection
