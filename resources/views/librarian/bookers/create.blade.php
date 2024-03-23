@extends('layouts.librarian')
@section('title', '| Add Issued Book')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="panel-heading">
                <h2 class="text-center font-bold text-lg uppercase">{{ $title }}</h2>
            </div>
            <div class="text-right">
                <x-back-button/>
            </div>
            <div class="mt-16 border rounded p-4">
                <form action="{{ route('librarian.bookers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="flex flex-col md:flex-row gap-2 md:mb-4">
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Select Student</label>
                            <div class="block">
                                @include('ext._get_students_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Select Book</label>
                            <div class="block">
                                @include('ext._attach_bookdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Serial No</label>
                            <div class="block">
                                <input type="text" name="serial_no" id="serial_no" class="lib-form-input" autocomplete="off" placeholder="Serial Number">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Issued Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="issued_date" id="issued_date" class="lib-form-input" placeholder="Issued Date">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Return Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="return_date" id="return_date" class="lib-form-input" placeholder="Return Date">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Recommentation</label>
                            <div class="block">
                                <input type="text" name="recommentation" id="recommentation" class="lib-form-input" placeholder="Recommentation">
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mt-4">
                        @include('ext._submit_create_button')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
