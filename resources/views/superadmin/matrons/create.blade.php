@extends('layouts.superadmin')
@section('title', '| Add Matron')

@section('content')
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h1 class="text-center uppercase font-bold text-2xl underline mb-4">Add Matron</h1>
            <x-back-button/>
            <div class="px-4 border-2 mt-8 py-8">
                <form action="{{ route('superadmin.matrons.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <div class="flex flex-col">
                                <label>Matron Role: <span class="text-danger">*</span></label>
                                @include('ext._attach_matron_rolediv')
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col md:flex-row lg:flex-row mt-8">
                        <div class="w-full">
                            <div class="flex flex-col">
                                <label>More About Matron: <span class="text-danger">*</span></label>
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-2">
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
