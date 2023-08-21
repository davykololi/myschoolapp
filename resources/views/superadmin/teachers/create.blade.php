@extends('layouts.superadmin')
@section('title', '| Add Teacher')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full md:p-8 lg:p-8  shadow-lg">
    <div class="w-full">
        <div class="card">
            <h1 class="uppercase text-center text-2xl font-bold underline mb-4">Add Teacher</h1>
            <x-back-button/>
            <div class="mt-8 border-2 px-4 pb-4">
                <form action="{{ route('superadmin.teachers.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    @include('ext._first_common_detailsdiv')
                    @include('ext._second_common_detailsdiv')
                    <div class="w-full flex flex-col">
                    	<div class="w-full">
                    		<div class="flex flex-col">
                            	<label>More About Teacher: <span class="text-danger">*</span></label>
                    			@include('ext._content_div')
                    		</div>
                    	</div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-4">
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
