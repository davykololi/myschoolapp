@extends('layouts.admin')
@section('title', '| School PDF Documents Download')

@section('content')
@role('admin')
@can('dataOfficer')
<x-backend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full">
                <div class="">
                    <div class="text-center bg-gray-100 md:rounded-2xl md:w-fit lg:w-fit mx-2 md:mx-auto px-4 py-1 mb-4 shadow-lg dark:bg-gray-700 dark:text-slate-400">
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
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL STUDENTS</div>
                            <div>
                                <a href="{{ route('admin.school.students') }}" class="mt-4">
                                    <x-generate-pdf/>
                                </a>
                            </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-one">SCHOOL TEACHERS</div>
                        <div>
                            <a href="{{ route('admin.school.teachers') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL SUB STAFFS</div>
                        <div class="w-full">
                            <a href="{{ route('admin.school.subordinates') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL CLUBS</div>
                        <div>
                            <a href="{{ route('admin.school.clubs') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL DEPARTMENTS</div>
                        <div>
                            <a href="{{ route('admin.school.depts') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL LETTER HEAD</div>
                        <div>
                            <a href="{{ route('admin.letter.head') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">SCHOOL PARENTS</div>
                        <div>
                            <a href="{{ route('admin.school.parents') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3">
                    <div id="marksheets_form" class="card-one india-box">
                        <div class="form-sub-heading-one">LIBRARY BOOKS</div>
                        <div>
                            <a href="{{ route('admin.school.libraryBooks') }}" class="mt-4">
                                <x-generate-pdf/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.stream.teachers') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STREAM TEACHERS</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.class.students') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">CLASS STUDENTS</div>
                        @include('ext._attach_classdiv')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.stream.students') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STREAM STUDENTS</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.dept.teachers') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">DEPARTMENT TEACHERS</div>
                        @include('ext._get_departments_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.club.students') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">CLUB STUDENTS</div>
                        @include('ext._get_clubs_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.club.teachers') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">CLUB TEACHERS</div>
                        @include('ext._get_clubs_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.student.details') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STUDENT DETAILS</div>
                        @include('ext._get_students_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            
                @if(!is_null($currentExam))
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.student.examResults') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries uppercase">{{ $results }}</div>
                        @include('ext._get_students_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.stream.register') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">STREAM REGISTER FORM</div>
                        @include('ext._get_streams_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.dormitory.students') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">DORMITORY STUDENTS</div>
                        @include('ext._get_dormitory_ids')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/3">
                    <form id="marksheets_form" action="{{ route('admin.dept.subordinates') }}" class="card-one purplestamp-box border" method="get">
                        {{ csrf_field() }}
                        <div class="form-sub-heading-fee-queries">DEPARTMENT SUBORDINATE STAFFS</div>
                        @include('ext._attach_departmentdiv')
                        <div class="w-full">
                            <div class="mt-4">
                                <x-button class="generate-button">GENERATE</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endcan
@endrole
@endsection
