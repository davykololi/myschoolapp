@extends('layouts.admin')
@section('title', '| Allocate Payment')

@section('content')
@role('admin')
@can('accountsAdmin')
<x-backend-main>
                <div>
                    <div>
                        <h3 class="uppercase text-center text-lg font-bold mb-4 underline">
                            {{ __('Payment Allocation') }}
                        </h3>
                    </div>
                    <div>@include('partials.errors')</div>

                    <div>
                        <h3 class="text-center font-bold">ALLOCATE PAYMENT TO CLASS</h3>
                        <form action="{{ route('admin.allocatePayments.class') }}" method="POST" class="shadowed-border-payment" enctype="multipart/form-data">
                            @include('ext._csrfdiv')
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Select Payment</label>
                                    <div class="w-full block">
                                        @include('ext._payment_section')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Year</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_yeardiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Term</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_termdiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Payment Class</label>
                                    <div class="w-full block">
                                        @include('ext._attach_classdiv')
                                    </div>
                                </div>
                            </div>
                            @include('ext._submit_allocate_button')
                        </form>
                    </div>

                    <div>
                        <h3 class="text-center font-bold">ALLOCATE PAYMENT TO STREAM</h3>
                        <form action="{{ route('admin.allocatePayments.stream') }}" method="POST" class="shadowed-border-payment" enctype="multipart/form-data">
                            @include('ext._csrfdiv')
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Select Payment</label>
                                    <div class="w-full block">
                                        @include('ext._payment_section')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Year</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_yeardiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Term</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_termdiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Payment Stream</label>
                                    <div class="input-div-two">
                                        @include('ext._get_streams_ids')
                                    </div>
                                </div>
                            </div>
                            @include('ext._submit_allocate_button')
                        </form>
                    </div>

                    <div>
                        <h3 class="text-center font-bold">ALLOCATE PAYMENT TO STUDENT</h3>
                        <form action="{{ route('admin.allocatePayments.student') }}" method="POST" class="shadowed-border-payment" enctype="multipart/form-data">
                            @include('ext._csrfdiv')
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Select Payment</label>
                                    <div class="w-full block">
                                        @include('ext._payment_section')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Year</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_yeardiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Term</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_termdiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 lg:w-1/4">
                                    <label class="label-one" >Payment Student</label>
                                    <div class="input-div-two">
                                        @include('ext._get_students_ids')
                                    </div>
                                </div>
                            </div>
                            @include('ext._submit_allocate_button')
                        </form>
                    </div>

                    <div>
                        <h3 class="text-center font-bold">ALLOCATE PAYMENT TO SCHOOL</h3>
                        <form action="{{ route('admin.allocatePayments.school') }}" method="POST" class="shadowed-border-payment" enctype="multipart/form-data">
                            @include('ext._csrfdiv')
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Select Payment</label>
                                    <div class="w-full block">
                                        @include('ext._payment_section')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Year</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_yeardiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Term</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_termdiv')
                                    </div>
                                </div>
                            </div>
                            @include('ext._submit_allocate_button')
                        </form>
                    </div>
                </div>
</x-backend-main>
@endcan
@endrole
@endsection