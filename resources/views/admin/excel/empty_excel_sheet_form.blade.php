@extends('layouts.admin')
@section('title', '| Empty Stream Students Excel Sheet Form')

@section('content')
@role('admin')
@can('examRegistrar')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">DOWNLOAD EXAM EXCEL MARKSHEET FORMS</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.excel.streamStudentsExelMarksheet') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">{{ __('EXM001 FORM') }}</h3>
                    <p class="italic">{{ __(('This form is used to collect raw students marks from streams to be fed into the database')) }}</p>
                    <div class="flex flex-col md:flex-row gap-2 mt-2">
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Stream: <span class="text-[red]">*</span></label>
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Exam: <span class="text-[red]">*</span></label>
                                @include('ext._get_exams_ids')
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-excel/>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <form id="marksheets_form" action="{{ route('admin.excel.classStudents') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">{{ __('CLS001 FORM') }}</h3>
                    <p class="italic">{{ __(('This an excel sheet form with the names of class students in a school')) }}</p>
                    <div class="flex flex-col md:flex-row gap-2 mt-2">
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Class: <span class="text-[red]">*</span></label>
                                @include('ext._attach_classdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-excel/>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <form id="marksheets_form" action="{{ route('admin.excel.streamStudents') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">{{ __('STR001 FORM') }}</h3>
                    <p class="italic">{{ __(('This an excel sheet form with the names of class students in a school')) }}</p>
                    <div class="flex flex-col md:flex-row gap-2 mt-2">
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Stream: <span class="text-[red]">*</span></label>
                                @include('ext._get_streams_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4">
                            <div class="flex flex-col">
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-excel/>
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

