@extends('layouts.admin')
@section('title', '| Students Import')

@section('content')
@role('admin')
@can('studentRegistrar')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">STUDENTS REGISTRATION IMPORT FORM</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.importStudents.store') }}" class="card-one" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="form-h2">STUDENTS REGISTRATION UPLOAD</h3>
                    @include('ext._students_sheet_upload_form')
                    <div class="w-full">
                        <div class="mt-4">
                            <x-button class="style-one-button">UPLOAD</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
</x-backend-main>
@endcan
@endrole
@endsection

