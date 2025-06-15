@extends('layouts.admin')
@section('title', '| Edit Exam')

@section('content')
@role('admin')
@can('examRegistrar')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-2xl">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <h2 class="admin-h2">Edit An Exam</h2>
            </div>
            <div class="justify-right">
                <x-button class="back-button">
                    <x-back-svg-n-url/>
                </x-button>
            </div>
            <div class="px-4 border-2 mt-8 py-8">
                <form action="{{ route('admin.exams.update', $exam->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Exam Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="name" id="name" class="lib-form-input" value="{{ $exam->name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >Exam Initials</label>
                            <div class="flex flex-col">
                                <input type="text" name="initials" id="initials" class="lib-form-input" value="{{ $exam->initials }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 md:mx-2 lg:mx-2">
                            <label class="w-full" >Start Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="start_date" id="start_date" class="lib-form-input" value="{{ $exam->start_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4 md:mx-2 lg:mx-2">
                            <label class="control-label col-sm-2" >End Date</label>
                            <div class="flex flex-col">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="end_date" id="end_date" class="lib-form-input" value="{{ $exam->end_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Year</label>
                            <div class="flex flex-col">
                                @include('ext._attach_yeardiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Term</label>
                            <div class="flex flex-col">
                                @include('ext._get_term_id')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Category</label>
                            <div class="flex flex-col">
                                <select id="exam_type" type="exam_type" value="{{old('exam_type')}}" class="lib-form-input" name="exam_type">
                                    <option value="{!! $exam->type !!}" @if($exam->type) selected @endif>
                                        {!! $exam->type !!}
                                    </option>
                                    <option value="{{ __('Mid Term Examinations') }}">{{ __('Mid Term Examinations') }}</option>
                                    <option value="{{ __('End Term Examinations') }}">{{ __('End Term Examinations') }}</option>
                                    <option value="{{ __('Mock Examinations') }}">{{ __('Mock Examinations') }}</option>
                                </select>

                                @if($errors->has('exam_type'))
                                <span class="help-block">
                                    <strong>{{$errors->first('exam_type')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Subjects</label>
                            <div class="flex flex-col">
                                @include('ext._attach_subjectdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Streams</label>
                            <div class="flex flex-col">
                                @include('ext._attach_streamdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:mx-2 lg:mx-2">
                            <label class="w-full" >Status</label>
                            <div class="flex flex-col">
                                @include('ext._attach_exam_status')
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
@endcan
@endrole
@endsection
