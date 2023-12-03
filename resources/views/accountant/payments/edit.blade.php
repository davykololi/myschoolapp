@extends('layouts.accountant')
@section('title', '| Edit Payment')

@section('content')
<x-frontend-main>
<div class="max-w-full px-4 md:px-8 lg:px-8 py-4 h-screen shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="w-full">
            <h5 class="uppercase text-center text-2xl font-bold underline mb-4">EDIT PAYMENT</h5>
            <x-back-button/>
            <div class="w-full border-2 p-4 mt-12">
                <form action="{{ route('accountant.payments.update', $payment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Payment Title</label>
                            <div class="flex flex-col">
                                <input type="text" name="title" id="title" class="form-control" value="{{ $payment->title }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Payment Description</label>
                            <div class="flex flex-col">
                                <input type="text" name="description" id="description" class="form-control" value="{{ $payment->description }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Payment Amount</label>
                            <div class="flex flex-col">
                                <input type="text" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Refrence Number</label>
                            <div class="flex flex-col">
                                <input type="text" name="ref_no" id="ref_no" class="form-control" value="{{ $payment->ref_no }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Year</label>
                            <div class="flex flex-col">
                                @include('ext._attach_yeardiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Term</label>
                            <div class="flex flex-col">
                                @include('ext._attach_termdiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Student</label>
                            <div class="flex flex-col">
                                <select id="student" type="text" value="{{old('student')}}" class="py-1 bg-gray-800 text-white w-full md:w-[220px] my-1 focus:shadow-outline focus:bg-black" name="student" data-te-select-init data-te-select-filter="true">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                    <option class="w-full md:w-[220px]" value="{{$student->id}}" @if($payment->student_id == $student->id) selected @endif>
                                        {{ $student->full_name }}
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
                    </div>
                    @include('ext._submit_update_button')
                </form>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
