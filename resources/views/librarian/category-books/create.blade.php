@extends('layouts.librarian')
@section('title', '| Add Book Category')

@section('content')
<x-frontend-main>
<div class="row">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="text-center font-bold uppercase text-2xl">Create Book Category</h2>
                
            </div>
            <div style="float:right;" class="items-center justify-center">
                <a href="{{ route('librarian.category-books.index') }}" class="bg-blue-500 text-white p-2 rounded md:hover:text-blue-500 md:hover:bg-white dark:bg-black dark:text-slate-400 mx-2">
                    Back
                </a>
            </div>
            <div class="w-full mt-12">
                <form action="{{ route('librarian.category-books.store') }}" method="POST" class="w-full border-2 border-black dark:border-slate-400 px-2 md:px-8 py-4" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <div class="flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" for="name">Category</label>
                            <div class="flex-1">
                                <input type="text" name="name" id="name" class="" placeholder="Name">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" for="desc">Description</label>
                            <div class="flex-1">
                                <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
