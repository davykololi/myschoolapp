@extends('layouts.admin')
@section('title', '| Add Book Category')

@section('content')
@role('admin')
@can('libraryAdmin')
<x-frontend-main>
<div class="max-w-screen mb-8">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-8">
            <div class="panel-heading">
                <h2 class="text-center font-bold uppercase text-2xl">Create Book Category</h2>
                
            </div>
            <div style="float:right;" class="items-center justify-center">
                <a href="{{ url()->previous() }}" class="bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 mx-2">
                    Back
                </a>
            </div>
            <div class="w-full mt-12">
                <form action="{{ route('admin.category-books.store') }}" method="POST" class="w-full border rounded dark:border-slate-400 px-2 md:px-8 py-4" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" for="name">Category</label>
                            <div class="flex-1">
                                <input type="text" name="name" id="name" class="" placeholder="Name">
                                @error('name')<span class="text-red-700">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" for="desc">Description</label>
                            <div class="flex-1">
                                <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                                @error('desc')<span class="text-red-700">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <x-bottom-create-button/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endcan
@endrole
@endsection
