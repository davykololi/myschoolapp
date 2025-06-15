@extends('layouts.accountant')
@section('title', '| Edit Payment')

@section('content')
@role('accountant')
<x-frontend-main>
<div class="max-w-screen px-4 md:px-8 lg:px-8 h-screen shadow-lg mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <h5 class="uppercase text-center text-2xl font-bold underline mb-4">
                EDIT PAYMENT FOR <span class="text-blue-700">{{ $payment->student->user->full_name }}</span>
            </h5>
            <x-back-button/>
            <div>@include('partials.errors')</div>
            <div class="w-full border-2 p-4 mt-12">
                <form action="{{ route('accountant.payments.update', $payment->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="student" id="student" class="form-input" value="{{ $payment->student_id }}">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row my-4 gap-2">
                        <div class="w-full md:w-1/3 lg:w-1/3">
                            <label class="control-label col-sm-2" >Payment Category</label>
                            <div class="block">
                                @include('ext._payment_section')
                            </div>
                        </div>
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
                    </div>
                    <div class="my-4">
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
