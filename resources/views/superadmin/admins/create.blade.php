@extends('layouts.superadmin')
@section('title', '| Add Admin')

@section('content')
<x-backend-main>
<div class="max-w-full p-4 md:p-8 lg:p-8 shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <h1 class="text-center text-2xl font-bold uppercase underline">Create Admin</h1>
            <x-back-button/>
            <div class="mt-8 border-2 px-4 py-4">
                <form action="{{ route('superadmin.admins.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Role</label>
                            <div class="flex flex-col">
                                @include('ext._attach_admin_role')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4">
                        <div class="w-full">
                            <label class="control-label col-sm-2" >More</label>
                            <div class="flex flex-col">
                                @include('ext._content_div')
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row mb-4 gap-4">
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
