@extends('layouts.teacher')
@section('title', '| Teacher Two Exams Report Card Form')

@section('content')
  <!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen page-container">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <h1 class="text-center uppercase text-2xl mb-4 font-bold underline">TWO EXAMS REPORT CARD GENERATION</h1>
            <div class="text-center uppercase pt-8">
                @include('partials.messages')
                @include('partials.errors')
                {!! Session::get('success') !!}
            </div>

            <div class="py-4 md:px-2 flex flex-col md:flex-row gap-2 md:gap-4 mb-2">
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <form action="{{ route('teacher.twoexams.reportcardSettings') }}" class="shadowed-border" method="post">
                        {{ csrf_field() }}
                        <h4 class="front-marksheet-h4">STEP:1 CHOOSE THE EXAMS</h4> 
                        <div class="flex flex-col md:flex-row gap-2 md:gap-4 mb-2">
                            <div class="w-full">
                                <div class="flex flex-col">
                                    <label>Select Exams: <span class="text-[red]">*</span></label>
                                    @include('ext._attach_examdiv')
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row mt-8">
                            <div class="w-fit">
                                <div class="block">
                                    <x-button class="generate-button">SET</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    
                <div class="w-full md:w-1/3 lg:w-1/3">
                    <form action="{{ route('teacher.twoexams.classtotals') }}" class="shadowed-border" method="post">
                        {{ csrf_field() }}
                        <h4 class="front-marksheet-h4">STEP:2 GERATE OVERAL CLASS POSITIONS</h4> 
                        <div class="flex flex-col md:flex-row gap-2 md:gap-4 mb-2">
                            <input type="hidden" name="year_id" value="{{ $currentYear->id }}"/>
                            <input type="hidden" name="term_id" value="{{ $currentTerm->id }}"/>
                            <div class="w-full">
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
                                    <x-button class="generate-button">GENERATE</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="w-full md:w-1/3 lg:w-1/3">
                    <form id="marksheets_form" action="{{ route('teacher.twoexams.streamtotals') }}" class="shadowed-border" method="post">
                        {{ csrf_field() }}
                        <h4 class="front-marksheet-h4">STEP:3 GENERATE STREAM POSITIONS</h4>
                        <div class="flex flex-col md:flex-row gap-2 md:gap-4 mb-2">
                            <input type="hidden" name="year_id" value="{{ $currentYear->id }}"/>
                            <input type="hidden" name="term_id" value="{{ $currentTerm->id }}"/>
                            <div class="w-full">
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
                                    <x-button class="generate-button">GENERATE</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-2 justify-evenly">
                <form id="marksheets_form" action="{{ route('teacher.twoexams.reportcard') }}" class="shadowed-border" method="get" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h4 class="front-marksheet-h4">STEP:4 GENERATE REPORT CARD</h4>
                    <input type="hidden" name="year_id" value="{{ $currentYear->id }}"/>
                    <input type="hidden" name="term_id" value="{{ $currentTerm->id }}"/>
                    <div class="flex flex-col md:flex-row gap-2 md:gap-4 mb-">
                        <div class="w-full md:w-1/3">
                            <div class="block">
                                <label>Stream: <span class="text-[red]">*</span></label>
                                <div class="block md:mr-6 lg:mr-6">
                                    @include('ext._get_streams_ids')
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="block">
                                <label>Student Name: <span class="text-[red]">*</span></label>
                                <div class="block md:mr-6 lg:mr-6">
                                    @include('ext._student_report')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-2 md:gap-8 my-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="block">
                                <label>Closing Date: <span class="text-[red]">*</span></label>
                                <div class="relative w-full md:w-[200px] bg-black text-white" data-te-datepicker-init data-te-format="dd, mmm, yyyy" data-te-input-wrapper-init>
                                    <input type="text" name="closing_date" class="w-full bg-black text-white" placeholder="Enter Closing Date"/>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3 md:-ml-[16px]">
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
                            <x-button class="generate-button">GENERATE</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection

