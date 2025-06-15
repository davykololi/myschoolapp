@extends('layouts.admin')
@section('title', '| MarkSheets Upload & Download')

@section('content')
@role('admin')
@can('examRegistrar')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">MARKSHEETS UPLOAD & RESULTS DOWNLOAD</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.stream.marksheet') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">STREAM RESULTS PDF DOWNLOAD</h3>
                    @include('ext._stream_results_form')
                    <div class="flex flex-col md:flex-row mt-4">
                        <div class="w-full mt-2">
                            <div class="relative mb-3 w-full md:w-1/4" data-te-input-wrapper-init>
                                <input type="number" name="pass_mark" min="0" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputNumber" placeholder="Example label" />
                                <label for="exampleFormControlInputNumber" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                    Enter Passmark
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="mt-4 items-center justify-center">
                            <x-generate-pdf/>
                        </div>
                    </div>
                </form>
    
                <form id="marksheets_form" action="{{ route('admin.stream.excelMarksheet') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">STREAM RESULTS EXCEL DOWNLOAD</h3>
                    @include('ext._stream_results_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-excel/>
                        </div>
                    </div>
                </form>

                <form id="marksheets_form" action="{{ route('admin.class.marksheet') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">CLASS RESULTS PDF DOWNLOAD</h3>
                    @include('ext._class_results_form')
                    <div class="flex flex-col md:flex-row mt-4">
                        <div class="w-full mt-2">
                            <div class="relative mb-3 w-full md:w-1/4" data-te-input-wrapper-init>
                                <input type="number" name="pass_mark" min="0" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputNumber" placeholder="Example label" />
                                <label for="exampleFormControlInputNumber" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                    Enter Passmark
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mt-4">
                            <x-generate-pdf/>
                        </div>
                    </div>
                </form>

                <form id="marksheets_form" action="{{ route('admin.class.excelMarksheet') }}" class="card-one" method="get">
                    {{ csrf_field() }}
                    <h3 class="form-h2">CLASS RESULTS EXCEL DOWNLOAD</h3>
                    @include('ext._class_results_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-excel/>
                        </div>
                    </div>
                </form>

                <form id="marksheets_form" action="{{ route('admin.streams.marksheetsImport') }}" class="card-one" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="form-h2">EXAM MARK SHEETS UPLOAD</h3>
                    @include('ext._marksheet_upload_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-button class="style-one-button">UPLOAD</x-button>
                        </div>
                    </div>
                </form>

                <form id="marksheets_form" action="{{ route('admin.marks.gradesheetsImport') }}" class="card-one" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="form-h2">SUBJECTS GRADE SHEET UPLOAD</h3>
                    @include('ext._gradesheets_upload_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-button class="style-one-button">UPLOAD</x-button>
                        </div>
                    </div>
                </form>

                <form id="marksheets_form" action="{{ route('admin.marks.generalGradesheetsImport') }}" class="card-one" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="form-h2">EXAM MEAN GRADES UPLOAD</h3>
                    @include('ext._general_gradesheets_upload_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-button class="style-one-button">UPLOAD</x-button>
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

