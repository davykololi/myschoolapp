@extends('layouts.accountant')

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
<div class="max-w-full p-4 md:p-8 lg:p-8 h-screen shadow-lg">
    <div class="col-lg-12">
        @include('partials.errors')
        <div class="card">
            <div class="card-header">
                <h5 class="uppercase font-bold text-2xl mb-8">
                    Edit {{ $paymentRecord->student->full_name }} Payment Record, {{ $paymentRecord->ref_no }} 
                </h5>
                <x-back-button/>
            </div>
            <div class="px-4 md:px-8 lg:px-8 border-2 py-4 mt-8">
                <form action="{{ route('accountant.paymentrecords.update',$paymentRecord->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="payment_id" value="{{ $paymentRecord->payment->id }}">
                    <input type="hidden" name="student_id" value="{{ $paymentRecord->payment->student->id }}">
                    <input type="hidden" name="payment_ref_no" value="{{ $paymentRecord->payment->ref_no }}">
                    <input type="hidden" name="year" value="{{ $paymentRecord->payment->year->year }}">
                    <div class="w-full flex flex-col md:flex-row lg:flex-row gap-2">
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Bank Name</label>
                            <div class="flex flex-col">
                                <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ $paymentRecord->bank_name }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Bank Receipt Copy</label>
                            <div class="flex flex-col">
                                <input type="file" name="file" id="file" class="form-control" value="{{ $paymentRecord->file }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Amount Paid</label>
                            <div class="flex flex-col">
                                <input type="text" name="amount_paid" id="amount_paid" class="form-control" value="{{ $paymentRecord->amount_paid }}">
                            </div>
                        </div>
                        <div class="w-full md:w-1/4 lg:w-1/4">
                            <label class="control-label col-sm-2" >Balance</label>
                            <div class="flex flex-col">
                                <input type="text" name="balance" id="balance" class="form-control" value="{{ $paymentRecord->balance }}">
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
