@extends('layouts.librarian')
@section('title', '| Librarian Queries')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-full h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
    <!-- Posts list -->
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="w-full">
                <div class="items-center justify-center mb-4">
                    <h2 class="text-center font-bold uppercase text-2xl">Perform Queries</h2>
                </div>
                <div class="text-center mx-2 mt-8">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
            <div class="mt-12">
                <div class="w-full flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 lg:w-1/2 md:mr-32 md:mx-0">
                        <form action="{{route('librarian.issuedbook.returnDate')}}" method="get" class="shadowed-border">
                            {{ csrf_field() }}
                            <label for="return_date" class="uppercase font-bold">Issued Books By Return Date pdf</label>
                            <div class="block mt-2">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" id="return_date" name="return_date" class="w-full bg-transparent" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-get-button/>
                            </div>
                        </form>
                    </div>

                    <div class="w-full md:w-1/2 lg:w-1/2 md:ml-32 md:mx-0">
                        <form action="{{route('librarian.issuedbook.issuedDate')}}" method="get" class="shadowed-border">
                            {{ csrf_field() }}
                            <label for="issued_date" class="uppercase font-bold">Issued Books By Date of Issue pdf</label>
                            <div class="block mt-2">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" id="issued_date" name="issued_date" class="w-full bg-transparent" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-get-button/>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-full flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 lg:w-1/2 md:mr-32 md:mx-0">
                        <form action="{{route('librarian.books.issuedBetween')}}" method="get" class="shadowed-border">
                            {{ csrf_field() }}
                            <label for="return_date" class="uppercase font-bold">Books Issued Between</label>
                            <div class="block mt-2">
                                <div class="flex flex-row gap-4">
                                    <div class="relative w-1/2" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                        <input type="text" id="start_date" name="start_date" class="w-full bg-transparent" placeholder="Select Date">
                                    </div>

                                    <div class="relative w-1/2" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                        <input type="text" id="end_date" name="end_date" class="w-full bg-transparent" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-get-button/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
