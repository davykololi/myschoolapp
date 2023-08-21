@extends('layouts.accountant')
@section('title', '| Show Payment')

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
<div class="w-full p-2 md:p-8">
    @include('partials.messages')
    <div class="w-full">
        <div>
            <h2 class="uppercase text-center font-bold text-2xl mb-4 pt-4">
                {{ $payment->student->full_name}} Payment Details
            </h2>
            <h3 class="uppercase text-left font-hairline text-2xl">
                Payment For {{ $payment->title }} worth <span class="text-red-700">Kshs: {{ $payment->amount }}</span> for the year {{ $payment->year->year}} {{ $payment->term->name }}
            </h3>
        </div>
        <div style="float:right" class="items-center justify-center">
            <x-back-button/>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Ref No:</strong>
                {{ $payment->ref_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span>
                    <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($payment->created_at)) }}
                </span>
            </div>
        </div>
    </div>

    <div>
        <div class="w-full items-center justify-center">
            <p>
                <span class="font-bold">Paid:</span>
                <span class="bg-green-800 px-2 text-white">Kshs: {{ number_format($payment->paid,2) }}</span>
            </p>
            @if($payment->amount > $payment->paid)
            <p>
                <span class="font-bold">Balance:</span> 
                <span class="bg-red-700 px-2 text-white">Kshs: {{ number_format($payment->balance,2) }}</span>
            </p>
            @else
            <p>
                <span class="font-bold">Balance:</span>
                <span class="bg-[green] px-2 text-white w-[100px] rounded">{{ __('CLEARED') }}</p>
            </span>
            @endif
        </div>

        @if($payment->amount > $payment->paid)
        <div class="w-full mt-4">
            <h3 class="text-center uppercase font-hairline text-lg">{{ __('Make Payment')}}</h3>
        </div>
        <div class="mt-8 md:p-4 border-2 border-white text-black dark:border-2 dark:border-slate-400 dark:bg-slate-900 dark:text-slate-600">
                <form action="{{ route('accountant.paymentrecords.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{ $payment->student->id }}">
                    <input type="hidden" name="payment_id" id="payment_id" class="form-control" value="{{ $payment->id }}">
                    <input type="hidden" name="payment_ref_no" id="payment_ref_no" class="form-control" value="{{ $payment->ref_no }}">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">   
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Bank Name</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="bank_name" id="bank_name" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('bank_name') }}" data-te-ripple-init placeholder="Bank Name">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Bank Payment Date</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <div class="relative w-full" data-te-datepicker-init data-te-inline="true" data-te-input-wrapper-init>
                                    <input type="text" name="payment_date" id="payment_date" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" value="{{ old('payment_date') }}" placeholder="Payment Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">  
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Receipt Number</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="payment_receipt_ref" id="payment_receipt_ref" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('payment_receipt_ref') }}" placeholder="Receipt Number">
                            </div>
                        </div> 
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Bank Receipt Copy</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="file" name="file" id="file" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('file') }}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row lg:flex-row">   
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Amount Paid</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="amount_paid" id="amount_paid" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('amount_paid') }}" placeholder="Amount">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <label class="uppercase">Balance</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="balance" id="balance" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('balance') }}" placeholder="Balance">
                            </div>
                        </div>
                    </div>
                    
                    @include('ext._submit_create_button')
                </form>
        </div>
        @endif
    </div>
</div>
</x-frontend-main>
@endsection
