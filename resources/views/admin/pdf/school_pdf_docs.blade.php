@extends('layouts.admin')
@section('title', '| School PDF Documents Download')

@section('content')
<x-backend-main>
<div class="max-w-screen">
    <div class="w-full">
        <div class="w-full">
            <div class="">
                <div class="text-center mb-4">
                    <h2 class="admin-h2">DOWNLOAD PDF DOCUMENTS</h2>
                </div>
                <div class="pt-8 uppercase text-center font-2xl">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    <div class="form-sub-heading-one">SCHOOL STUDENTS</div>
                        <div>
                            <a href="{{ route('admin.school.students') }}" class="mt-4 pdf">
                                <x-pdf-svg/>
                            </a>
                        </div>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-one">SCHOOL TEACHERS</div>
                    <div>
                        <a href="{{ route('admin.school.teachers') }}" class="mt-4 pdf">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    <div class="form-sub-heading-one">SCHOOL SUB STAFFS</div>
                    <div class="w-full">
                        <a href="{{ route('admin.school.staffs') }}" class="mt-4 pdf">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    <div class="form-sub-heading-one">SCHOOL CLUBS</div>
                    <div>
                        <a href="{{ route('admin.school.clubs') }}" class="mt-4 pdf">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    <div class="form-sub-heading-one">SCHOOL DEPARTMENTS</div>
                    <div>
                        <a href="{{ route('admin.school.depts') }}" class="mt-4 pdf">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div id="marksheets_form" class="shadowed-border">
                    <div class="form-sub-heading-one">SCHOOL LETTER HEAD</div>
                    <div>
                        <a href="{{ route('admin.letter.head') }}" class="mt-4 pdf">
                            <x-pdf-svg/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.stream.teachers') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">STREAM TEACHERS</div>
                    @include('ext._get_streams_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.class.students') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">CLASS STUDENTS</div>
                    @include('ext._attach_classdiv')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.stream.students') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">STREAM STUDENTS</div>
                    @include('ext._get_streams_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.dept.teachers') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">DEPARTMENT TEACHERS</div>
                    @include('ext._get_departments_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.club.students') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">CLUB STUDENTS</div>
                    @include('ext._get_clubs_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.club.teachers') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">CLUB TEACHERS</div>
                    @include('ext._get_clubs_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:flex-row gap-2">
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.student.details') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries">STUDENT DETAILS</div>
                    @include('ext._get_students_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            
            @if(!is_null($currentExam))
            <div class="w-full md:w-1/3">
                <form id="marksheets_form" action="{{ route('admin.student.examResults') }}" class="shadowed-border" method="get">
                    {{ csrf_field() }}
                    <div class="form-sub-heading-fee-queries uppercase">{{ $results }}</div>
                    @include('ext._get_students_ids')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-generate-button/>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
</x-backend-main>
@endsection
