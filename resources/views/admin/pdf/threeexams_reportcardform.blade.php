@extends('layouts.admin')
@section('title', '| Three Exams Report Card Form')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
    <div>
        <h1 class="text-center uppercase text-2xl mb-4 font-bold underline">THREE EXAMS REPORT CARD GENERATION</h1>
    </div>
    <div class="text-center uppercase pt-8">
        @include('partials.messages')
        @include('partials.errors')
        {!! Session::forget('success') !!}
    </div>
    <div class="py-4 md:px-2 justify-evenly">
    <form action="{{ route('admin.threeexams.classtotals') }}" class="shadowed-border" method="post">
        {{ csrf_field() }}
        <div class="text-blue-800 font-bold mb-2 dark:text-slate-400">STEP:1 GERATE OVERAL CLASS POSITIONS</div>
        
        <div class="flex flex-col md:flex-row gap-2 md:gap-16 mb-2">
            <div class="w-full md:w-1/3">
                <div class="flex flex-col">
                    <label>Select Exams: <span class="text-[red]">*</span></label>
                    @include('ext._attach_examdiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Year: <span class="text-[red]">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Term: <span class="text-[red]">*</span></label>
                    @include('ext._get_term_id')
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 md:gap-16 mb-2">
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Class: <span class="text-[red]">*</span></label>
                    <div class="block md:mr-11 lg:mr-11">
                        @include('ext._attach_classdiv')
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row mt-8">
            <div class="w-fit">
                <div class="block">
                    <x-generate-button/>
                </div>
            </div>
        </div>
    </form>
    </div>

    <div class="py-4 md:px-2 justify-evenly">
    <form id="marksheets_form" action="{{ route('admin.threeexams.streamtotals') }}" class="shadowed-border" method="post">
        {{ csrf_field() }}
        <div class="text-blue-800 font-bold mb-2 dark:text-slate-400">STEP:2 GENERATE STREAM POSITIONS</div>
        <div class="flex flex-col md:flex-row gap-2 md:gap-16 mb-2">
            <div class="w-full md:w-1/3">
                <div class="flex flex-col">
                    <label>Select Exams: <span class="text-[red]">*</span></label>
                    @include('ext._attach_examdiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Year: <span class="text-[red]">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Term: <span class="text-[red]">*</span></label>
                    @include('ext._get_term_id')
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 md:gap-16 mb-2">
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Stream: <span class="text-[red]">*</span></label>
                    <div class="block md:mr-11 lg:mr-11">
                        @include('ext._get_streams_ids')
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row mt-8">
            <div class="w-fit">
                <div class="block">
                    <x-generate-button/>
                </div>
            </div>
        </div>
    </form>
    </div>

    <div class="py-4 md:px-2 justify-evenly">
    <form id="marksheets_form" action="{{ route('admin.report.subjectGrades') }}" class="shadowed-border" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="font-bold mb-4">UPLOAD REPORT CARD SUBJECTS AVERAGE GRADES </div>
        @include('ext._reportcardsubjectgrades_importsheet')
        <div class="w-full">
            <div class="mt-4">
                <x-upload-button/>
            </div>
        </div>
    </form>
    </div>

    <div class="py-4 md:px-2 justify-evenly">
    <form id="marksheets_form" action="{{ route('admin.report.meangrades') }}" class="shadowed-border" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="font-bold mb-4">UPLOAD REPORT CARD GENERAL GRADES </div>
        @include('ext._reportcardgeneralgrades_importsheet')
        <div class="w-full">
            <div class="mt-4">
                <x-upload-button/>
            </div>
        </div>
    </form>
    </div>

    <div class="py-4 md:px-2 justify-evenly">
    <form id="marksheets_form" action="{{ route('admin.reportcard.remarks') }}" class="shadowed-border" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="text-blue-800 font-bold mb-2 dark:text-slate-400">UPLOAD REPORT CARD COMMENTS</div>
        <div class="flex flex-col md:flex-row gap-2 mb-2">
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Year: <span class="text-[red]">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Term: <span class="text-[red]">*</span></label>
                    @include('ext._get_term_id')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Stream: <span class="text-[red]">*</span></label>
                    @include('ext._attach_classdiv')
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 mb-2">
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>UPLOAD COMMENTS FILE:<span class="text-[red]">*</span></label>
                    <input type="file" name="file" class="w-full text-black text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded">
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 mb-2">
            <div class="w-full md:w-1/3">
                <x-upload-button/>
            </div>
        </div>
    </form>
    </div>

    <div class="py-4 md:px-2 justify-evenly">
    <form id="marksheets_form" action="{{ route('admin.threeexams.reportcard') }}" class="shadowed-border" method="get" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="text-blue-800 font-bold mb-2 dark:text-slate-400">STEP:3 GENERATE REPORT CARD</div>
        <div class="flex flex-col md:flex-row gap-2 md:gap-8 mb-4">
            <div class="w-full md:w-1/3">
                <div class="flex flex-col">
                    <label>Select Exams: <span class="text-[red]">*</span></label>
                    @include('ext._attach_examdiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Year: <span class="text-[red]">*</span></label>
                    @include('ext._attach_yeardiv')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Term: <span class="text-[red]">*</span></label>
                    @include('ext._get_term_id')
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 md:gap-8 mb-4">
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Stream: <span class="text-[red]">*</span></label>
                    @include('ext._get_streams_ids')
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="block">
                    <label>Student Name: <span class="text-[red]">*</span></label>
                    @include('ext._student_report')
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-2 md:gap-8 mb-3">
            <div class="w-full md:w-1/3 md:mr-[85px]">
                <div class="block">
                    <label>Closing Date: <span class="text-[red]">*</span></label>
                    <div class="relative w-full md:w-[200px] bg-black text-white" data-te-datepicker-init data-te-format="dd, mmm, yyyy" data-te-input-wrapper-init>
                        <input type="text" name="closing_date" class="w-full bg-black text-white" placeholder="Enter Closing Date"/>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 md:ml-[85px]">
                <div class="block">
                    <label>Opening Date: <span class="text-[red]">*</span></label>
                    <div class="relative w-full md:w-[200px] bg-black text-white" data-te-datepicker-init data-te-format="dd, mmm, yyyy" data-te-input-wrapper-init>
                        <input type="text" name="opening_date" class="w-full bg-black text-white" placeholder="Enter Opening Date"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 mb-2">
            <div class="w-full md:w-1/3">
                <x-generate-button/>
            </div>
        </div>
    </form>
    </div>
</x-backend-main>
@endsection

