@extends('layouts.superadmin')
@section('title', '| Edit Teacher')

@section('content')
<!-- frontend-main view -->
<x-backend-main>
<div class="max-w-full shadow-lg">
    <div class="w-full p-4 md:p-8 lg:p-8">
        <div>
            <h5 class="text-center uppercase font-bold text-2xl underline mb-8">EDIT TEACHER</h5>
            <x-back-button/>
            <div class="border-2 px-4 md:px-8 lg:px-8 py-4 mt-8">
                <form action="{{ route('superadmin.teachers.update', $teacher->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    @include('ext._teacher_edit_form')
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-backend-main>
@endsection
