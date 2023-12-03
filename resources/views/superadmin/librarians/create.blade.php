@extends('layouts.superadmin')
@section('title', '| Add Librarian')

@section('content')
<x-backend-main>
<div class="max-w-full p-4 md:p-8 lg:p-8 shadow-2xl">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h1 class="text-center text-2xl font-bold uppercase underline mb-4">Create Librarian</h1>
            <x-back-button/>
            <div class="mt-8 border-2 px-4 py-4">
                <form action="{{ route('superadmin.librarians.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Librarian Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_librarian_role')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-2">
                        <div class="w-full">
                            <div class="flex flex-col">
                                <label>More About Librarian: <span class="text-danger">*</span></label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-2 my-4 gap-4">
                        @include('ext._passworddiv')
                    </div>
                    @include('ext._submit_register_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
