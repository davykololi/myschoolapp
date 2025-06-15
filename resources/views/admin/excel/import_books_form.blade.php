@extends('layouts.admin')
@section('title', '| Library Books Import')

@section('content')
@role('admin')
@can('libraryAdmin')
<!-- backend-main view -->
<x-backend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full mx-auto text-center mb-4 mt-8">
                <h2 class="admin-h2 md:scale3d-150 lg:scale3d-150">IMPORT BOOKS</h2>
            </div>
            <div class="mx-2 md:mx-16 lg:mx-16 font-hairline my-8">
                @include('partials.messages')
                @include('partials.errors')
            </div>
            <div>
                <form id="marksheets_form" action="{{ route('admin.importBooks.store') }}" class="card-one" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="form-h2">THIS FORM IS USED TO IMPORT BOOKS TO DATABASE</h3>
                    <div class="flex flex-col md:flex-row gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Library Name: <span class="text-[red]">*</span></label>
                                @include('ext._attach_librarydiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">Book Genre: <span class="text-[red]">*</span></label>
                                @include('ext._get_book_genres_ids')
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <div class="flex flex-col">
                                <label class="label-two">BOOKS SHEET FILE:<span class="text-[red]">*</span></label>
                                <input type="file" name="file" class="form-file-upload" />
                            </div>
                        </div>
                    </div>
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

