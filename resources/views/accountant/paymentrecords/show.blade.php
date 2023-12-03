@extends('layouts.accountant')
@section('title', '| Show Payment Record')

@section('content')
  <!-- frontend-main view -->
  <x-frontend-main>
<div class="w-full p-2 md:p-8 h-screen">
    @include('partials.messages')
    <div class="w-full">
        <div>
            <h2 class="uppercase text-left font-bold text-lg mb-4 pt-4">
                Payment Details For Kshs: {{ $paymentRecord->amount_paid }} belonging to {{ $paymentRecord->student->full_name}} as payment for {{ $paymentRecord->payment->title }}
            </h2>
        </div>
        <div style="float:right" class="items-center justify-center">
            <x-back-button/>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank Name:</strong>
                {{ $paymentRecord->bank_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank Ref Receipt:</strong>
                {{ $paymentRecord->payment_receipt_ref }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Date:</strong>
                {{ $paymentRecord->payment_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Ref No:</strong>
                {{ $paymentRecord->ref_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <span>
                    <strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($paymentRecord->created_at)) }}
                </span>
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
@endsection
