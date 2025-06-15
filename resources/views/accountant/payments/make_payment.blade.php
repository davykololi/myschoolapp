@extends('layouts.accountant')
@section('title', '| Make Payment')

@section('content')
@role('accountant')
<!-- frontend-main view -->
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="rounded-t bg-transparent mb-0 px-6 py-6 dark:bg-slate-900">
                <div class="text-center flex justify-between">
                    <h1 class="text-blueGray-700 text-xl font-bold uppercase dark:text-slate-300">
                        Make Payment
                    </h1>

                    <x-button class="back-button mt-8">
                        <x-back-svg-n-url/>
                    </x-button>
                </div>
            </div>
            @include('partials.messages')
            <div class="uppercase leading-tight w-full md:w-1/3 lg:w-1/3 border rounded dark:bg-slate-900 p-2 md:scale-y-75 text-sm">
                <p class="text-left">
                    <span class="font-bold">Student Name:</span> {{ $payment->student->user->full_name }} 
                </p>
                <p class="text-left">
                    <span class="font-bold">Payment Ref No:</span> {{ $payment->ref_no }} 
                </p>
                <p class="text-left">
                    <span class="font-bold">Payment For:</span> {{ $payment->payment_section->name }} 
                </p>
                <p><span class="font-bold">Total Amount:</span> Kshs: {{ $payment->amount }}</p>
                <p>
                    <span class="font-bold">Paid:</span> Kshs: <span class="text-green-700">{{ number_format($payment->paid,2) }}</span>
                </p>
                <p> 
                    @if($payment->amount > $payment->paid)
                    <span class="uppercase font-bold">Balance:</span> 
                    Kshs: <span class="text-red-700">{{ number_format($payment->balance,2) }}</span>
                    @else
                    <div class="font-bold">CLEARANCE: <span class="bg-[green] px-2 text-white w-fit">{{ __('CLEARED') }}</span></div>
                    @endif
                </p>
            </div>

            @if($payment->amount > $payment->paid)
            <div class="mt-8 p-4 border border-white rounded dark:border dark:border-slate-400 dark:bg-slate-900 dark:text-slate-600">
                <form action="{{ route('accountant.paymentrecords.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{ $payment->student->id }}">
                    <input type="hidden" name="payment_id" id="payment_id" class="form-control" value="{{ $payment->id }}">
                    <input type="hidden" name="payment_section_id" id="payment_section_id" class="form-control" value="{{ $payment->payment_section_id }}">
                    <input type="hidden" name="payment_ref_no" id="payment_ref_no" class="form-control" value="{{ $payment->ref_no }}">
                    <input type="hidden" name="payment_balance" id="payment_balance" class="form-control" value="{{ $payment->balance }}">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">   
                        <div class="w-full md:w-1/2 lg:w-1/2 md:mr-32 lg:mr-32">
                            <label class="uppercase">Payment Mode</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch">
                                <input type="text" name="payment_mode" id="payment_mode" class="form-input-two" value="{{ old('payment_mode') }}" data-te-ripple-init placeholder="Payment Mode">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2 md:ml-32 lg:ml-32">
                            <label class="uppercase">Payment Date</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="payment_date" id="payment_date" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" value="{{ old('payment_date') }}" placeholder="Payment Date">
                                    @error('payment_date')
                                    <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">  
                        <div class="w-full md:w-1/2 lg:w-1/2 md:mr-32 lg:mr-32">
                            <label class="uppercase">Payment Serial/Code</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch">
                                <input type="text" name="payment_ref_code" id="payment_ref_code" class="form-input-two" value="{{ old('payment_ref_code') }}" autocomplete="off" placeholder="Payment Serial/Code">
                                @error('payment_ref_code')
                                <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> 
                        <div class="w-full md:w-1/2 lg:w-1/2 md:ml-32 lg:ml-32">
                            <label class="uppercase">Amount Paid</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch">
                                <input type="text" name="amount_paid" id="amount_paid" class="form-input-two" value="{{ old('amount_paid') }}" autocomplete="off" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="my-1">
                        @include('ext._submit_create_button')
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
</x-frontend-main>
@endrole
@endsection
