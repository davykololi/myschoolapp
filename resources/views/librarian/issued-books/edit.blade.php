@extends('layouts.librarian')
@section('title', '| Edit Issued Book')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        @include('partials.errors')
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="panel-heading">
                <h2 class="text-center font-bold text-lg uppercase">{{ $title }}</h2>
            </div>
            <div class="text-right">
                <x-back-button/>
            </div>
            <div class="mt-16 border rounded p-4">
                <form action="{{ route('librarian.issued-books.update', $booker->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">

                    <div class="flex flex-col md:flex-row gap-2 md:mb-4">
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Select Student</label>
                            <div class="block">
                                <select id="student" type="student" value="{{old('student')}}" class="leading-tight" name="student" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Student">
                                @foreach ($students as $student)
                                <option value="{{$student->id}}" @if($booker->student_id == $student->id) selected @endif>
                                    {{$student->user->full_name}}
                                </option>
                                @endforeach
                                </select>

                                @if($errors->has('student'))
                                <span class="help-block">
                                    <strong>{{$errors->first('student')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Select Book</label>
                            <div class="block">
                                <select id="book" type="book" value="{{old('book')}}" class="form-control" name="book" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Select Book">
                                @foreach ($books as $book)
                                    <option value="{{$book->id}}" @if($booker->book_id == $book->id) selected @endif>
                                        {{$book->title}}
                                    </option>
                                @endforeach
                                </select>

                                @if($errors->has('book'))
                                <span class="help-block">
                                    <strong>{{$errors->first('book')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Serial No</label>
                            <div class="block">
                                <input type="text" name="serial_no" id="serial_no" class="lib-form-input" value="{{$issuedBook->serial_no}}">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-2">
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Issued Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="issued_date" id="issued_date" class="lib-form-input" value="{{$issuedBook->issued_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Return Date</label>
                            <div class="block">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="return_date" id="return_date" class="lib-form-input" value="{{$issuedBook->return_date}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="status_returned" id="status_returned" value="{{$issuedBook->returned_status ? 'Good':'Poor'}}">
                        </div>
                        <div class="w-full md:w-1/3 lg:1/3 md:mx-4">
                            <label class="" >Recommendation</label>
                            <div class="block">
                                <input type="text" name="recommentation" id="recommentation" class="lib-form-input" value="{{$issuedBook->recommentation}}">
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mt-4">
                        @include('ext._submit_update_button')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
